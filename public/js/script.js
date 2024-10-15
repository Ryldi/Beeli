if (document.querySelector('[data-carousel-item]')) {
    document.addEventListener('DOMContentLoaded', function() {
        const items = document.querySelectorAll('[data-carousel-item]');
        const nextBtn = document.querySelector('[data-carousel-next]');
        const prevBtn = document.querySelector('[data-carousel-prev]');
        const indicators = document.querySelectorAll('[data-carousel-slide-to]');
        let currentIndex = 0;

        function showSlide(index) {
            items.forEach((item, i) => {
                item.style.display = 'none';
                indicators[i].setAttribute('aria-current', 'false');
                indicators[i].classList.remove('bg-accent');
            });

            items[index].style.display = 'flex';
            indicators[index].classList.add('bg-accent');
            indicators[index].setAttribute('aria-current', 'true');
        }

        showSlide(currentIndex);

        function nextSlide() {
            currentIndex = (currentIndex + 1) % items.length;
            showSlide(currentIndex);
        }

        autoSlideInterval = setInterval(nextSlide, 5000);

        nextBtn.addEventListener('click', function() {
            currentIndex = (currentIndex + 1) % items.length;
            showSlide(currentIndex);
            resetAutoSlide();
        });

        prevBtn.addEventListener('click', function() {
            currentIndex = (currentIndex - 1 + items.length) % items.length;
            showSlide(currentIndex);
            resetAutoSlide();
        });

        indicators.forEach((indicator, index) => {
            indicator.addEventListener('click', function() {
                currentIndex = index;
                showSlide(currentIndex);
                resetAutoSlide();
            });
        });

        function resetAutoSlide() {
            clearInterval(autoSlideInterval);
            autoSlideInterval = setInterval(nextSlide, 5000);
        }
    });
}
