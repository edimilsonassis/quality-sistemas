const id = document.getElementById('cId');
const save = document.getElementById('save');
const photo = document.getElementById('cFoto');
const form = document.getElementById('formCadastrar');

photo.addEventListener('change', function (e) {
    const file = e.target.files[0];
    const fileReader = new FileReader();

    fileReader.onloadend = function (e) {
        const img = document.getElementById('imgFoto');
        img.src = e.target.result;
    }

    fileReader.readAsDataURL(file);
});

form.addEventListener('submit', async function (e) {
    e.preventDefault();

    const formData = new FormData(form);
    try {
        const response = await axios.post(`/api/peoples`, formData, {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        })

        if (response.status !== 202)
            throw response;

    } catch (error) {
        return await Swal.fire({
            title: error.response.data.error ?? 'Erro ao atualizar o cadastro!',
            icon: 'error',
            confirmButtonText: 'OK'
        })
    }

    await Swal.fire({
        title: 'Sucesso!',
        text: 'Cadastro atualizado com sucesso!',
        icon: 'success',
        confirmButtonText: 'OK'
    })

    window.location.href = '/cadastros';
});
