document.addEventListener('DOMContentLoaded', function () {
    const slider = document.querySelector('.slider');
    let isSliding = false;

    function nextSlide() {
        if (!isSliding) {
            isSliding = true;
            slider.style.transform = 'translateX(-100%)';
            setTimeout(() => {
                const firstSlide = slider.children[0];
                slider.appendChild(firstSlide);
                slider.style.transform = 'translateX(0)';
                isSliding = false;
            }, 500);
        }
    }

    setInterval(nextSlide, 3000); // Change slide every 3 seconds
});