document.addEventListener('DOMContentLoaded', (event) => {
    const description = document.getElementById('description');
    const descriptionCount = document.getElementById('description-count');

    description.addEventListener('input', function () {
        const currentLength = description.value.length;
        descriptionCount.textContent = `${currentLength} / 512`;
    });
});