const form = document.getElementById('frmAdicionaDep');
const table = document.getElementById('tLista');
const tbody = table.querySelector('tbody')
const template = table.querySelector('template');

form.addEventListener('submit', async (e) => {
    e.preventDefault();

    const formData = new FormData(form);

    try {
        const response = await axios.post(`/api/peoples/${peopleId}/dependents`, formData)

        if (response.status !== 202)
            throw response;

    } catch (error) {
        return await Swal.fire({
            title: error.response.data.error ?? 'Erro ao adicionar o dependente!',
            icon: 'error',
            confirmButtonText: 'OK'
        })
    }

    Swal.fire({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timerProgressBar: true,
        timer: 2000,
        title: 'Sucesso!',
        text: 'Dependente adicionado com sucesso!',
        icon: 'success',
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        },
        confirmButtonText: 'OK'
    })

    loadItems()
});

async function loadItems() {
    const response = await axios.get(`/api/peoples/${peopleId}/dependents`)

    if (!response.data)
        return Swal.fire({
            title: 'Erro ao carregar os dependentes',
            icon: 'error'
        })

    const dependents = response.data;

    tbody.innerHTML = '';

    if (!dependents.length) {
        const tr = document.createElement('tr')
        const td = document.createElement('td')

        td.setAttribute('colspan', 3)
        td.setAttribute('align', 'center')
        td.innerText = 'Nenhum cadastro encontrado'
        tr.appendChild(td)

        tbody.appendChild(tr)
    }

    dependents.forEach((dependent) => {
        const tr = document.importNode(template.content, true).querySelector('tr')

        const dateFormated = new Date(dependent.birth).toLocaleDateString('pt-BR', { timeZone: 'UTC' })

        tr.querySelector('td[name="name"]').innerText = dependent.name
        tr.querySelector('td[name="birth"]').innerText = dateFormated

        tr.querySelector('td[name="action"] a').addEventListener('click', async (e) => {
            e.preventDefault();

            const prompt = await Swal.fire({
                title: `Deseja realmente excluir o dependente<br/><b class="text-red-600">${dependent.name}</b>?`,
                icon: 'question',
                customClass: {
                    confirmButton: 'swal2-deny swal2-styled',
                    cancelButton: 'swal2-confirm swal2-styled'
                },
                reverseButtons: true,
                showCancelButton: true,
                confirmButtonText: 'Sim',
                cancelButtonText: 'Não'
            })

            if (prompt.isConfirmed) {
                const response = await axios.delete(
                    `/api/peoples/${peopleId}/dependents/${dependent.id}`)

                if (!response.data)
                    return Swal.fire({
                        title: 'Erro ao excluir o dependente',
                        icon: 'error'
                    })

                loadItems();
            }
        })

        tbody.appendChild(tr);
    });

}

loadItems()
