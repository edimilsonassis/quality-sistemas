const pags = document.getElementById('pags')
const prevPage = document.getElementById('prevPage')
const nextPage = document.getElementById('nextPage')
const limit_items = document.getElementById('limit_items')
const delete_all = document.getElementById('delete_all')
const select_all = document.getElementById('select_all')
const table_template = document.querySelector('#tLista template')

limit_items.addEventListener('change', (e) => {
    updateUrlParams('itens', e.target.value)
    updateUrlParams('pagina', 1)

    loadItems();
})

select_all.addEventListener('change', (e) => {
    const checkboxes = document.querySelectorAll('input[type="checkbox"]')
    checkboxes.forEach((checkbox) => {
        checkbox.checked = e.target.checked
    })
})

delete_all.addEventListener('click', async (e) => {
    e.preventDefault()

    const checkboxes = document.querySelectorAll('tbody input[type="checkbox"]')
    const ids = []

    checkboxes.forEach((checkbox) => {
        if (checkbox.checked)
            ids.push(checkbox.value)
    })

    if (ids.length == 0)
        return Swal.fire({
            title: 'Selecione ao menos um cadastro',
            icon: 'error'
        })

    const prompt = await Swal.fire({
        title: `Deseja excluir ${ids.length} cadastro${ids.length > 1 ? 's' : ''}?`,
        customClass: {
            confirmButton: 'swal2-deny swal2-styled',
            cancelButton: 'swal2-confirm swal2-styled'
        },
        showCancelButton: true,
        confirmButtonText: 'Excluir',
        denyButtonText: `Voltar`,
        reverseButtons: true
    })

    if (!prompt.isConfirmed) return

    const response = await axios.delete('/api/peoples', {
        data: {
            ids
        }
    })

    if (!response.data)
        return Swal.fire({
            title: 'Erro ao excluir os cadastros',
            icon: 'error'
        })

    loadItems()
})

function changePage(e) {
    e.preventDefault()

    const nextPage = new URLSearchParams(e.target.href.split('?')[1]);
    updateUrlParams('pagina', nextPage.get('pagina'))

    loadItems();
}

prevPage.addEventListener('click', changePage)

nextPage.addEventListener('click', changePage)

async function loadItems() {
    const urlParams = new URLSearchParams(window.location.search);

    const response = await axios.get('/api/peoples', {
        params: {
            limit: urlParams.get('itens'),
            page: urlParams.get('pagina')
        }
    })

    if (!response.data)
        return Swal.fire({
            title: 'Erro ao carregar os cadastros',
            icon: 'error'
        })


    const peoples = response.data.data
    const table = document.getElementById('tLista')
    const tbody = table.querySelector('tbody')

    pags.innerHTML = `${response.data.current_page} de ${response.data.last_page}`
    prevPage.href = `?pagina=${response.data.current_page - 1 || '#'}`
    nextPage.href = `?pagina=${response.data.current_page + 1 || '#'}`
    select_all.checked = false
    tbody.innerHTML = ''

    if (!peoples.length) {
        const tr = document.createElement('tr')
        const td = document.createElement('td')

        td.setAttribute('colspan', 8)
        td.setAttribute('align', 'center')
        td.innerText = 'Nenhum cadastro encontrado'
        tr.appendChild(td)

        tbody.appendChild(tr)
    }

    peoples.forEach((people) => {
        const tr = document.importNode(table_template.content, true).querySelector('tr')

        const dateFormated = new Date(people.birth).toLocaleDateString('pt-BR', { timeZone: 'UTC' })

        tr.querySelector('[name="chkStatus"]').value = people.id
        tr.querySelector('td[name="id"]').innerText = people.id
        tr.querySelector('td[name="photo"] img').src = people.photo
        tr.querySelector('td[name="name"] a').innerText = people.name
        tr.querySelector('td[name="name"] a').href = `/cadastros/${people.id}`
        tr.querySelector('td[name="birth"]').innerText = dateFormated
        tr.querySelector('td[name="email"]').innerText = people.email
        tr.querySelector('td[name="dependents"] a').href = `/cadastros/${people.id}/dependentes`

        const elStatus = tr.querySelector('td[name="tootle_status"] a')

        people.active == 1 ? elStatus.classList.add('btVerde') : elStatus.classList.add('btCinza')

        elStatus.addEventListener('click', async (e) => {
            e.preventDefault()

            const prompt = await Swal.fire({
                title: `Deseja ${people.active == 1 ? 'desativar' : 'ativar'}<br/><b class="text-nowrap text-green-600">${people.name}</b>`,
                customClass: {
                    confirmButton: 'swal2-deny swal2-styled',
                    cancelButton: 'swal2-confirm swal2-styled'
                },
                showCancelButton: true,
                confirmButtonText: `${people.active == 1 ? 'Desativar' : 'Ativar'}`,
                denyButtonText: `Voltar`,
                reverseButtons: true
            })

            if (!prompt.isConfirmed) return

            const response = await axios.put(`/api/peoples/${people.id}/status`, {
                active: !people.active
            })

            loadItems()
        })

        tbody.appendChild(tr)
    })
}

loadItems()
