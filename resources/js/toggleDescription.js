document.addEventListener('DOMContentLoaded', () => {

    // =====================
    // 説明モーダル
    // =====================
    const descModal = document.getElementById('description-modal');
    const modalDescription = document.getElementById('modal-description');
    const descClose = document.querySelector('.desc-close');

    document.querySelectorAll('.show-description').forEach(button => {
        button.addEventListener('click', () => {
            const description = button.getAttribute('data-description');
            modalDescription.textContent = description;
            descModal.style.display = 'flex';
        });
    });

    descClose.addEventListener('click', () => {
        descModal.style.display = 'none';
    });

    // =====================
    // 画像モーダル
    // =====================
    const imageModal = document.getElementById('image-modal');
    const modalImage = document.getElementById('modal-image');
    const imageClose = document.querySelector('.image-close');

    document.querySelectorAll('.thumbnail').forEach(img => {
        img.addEventListener('click', () => {
            const imageUrl = img.getAttribute('data-image');
            modalImage.src = imageUrl;
            imageModal.style.display = 'flex';
        });
    });

    imageClose.addEventListener('click', () => {
        imageModal.style.display = 'none';
    });

    // =====================
    // モーダル外クリックで閉じる
    // =====================
    window.addEventListener('click', (e) => {
        if (e.target === descModal) descModal.style.display = 'none';
        if (e.target === imageModal) imageModal.style.display = 'none';
    });
});
