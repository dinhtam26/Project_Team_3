<div class="home__container">
    <div class="slideshow" style="position:relative">
        <div class="slideshow__inner">
            <div class="slideshow__item fade" style="display: none; animation: fade 1.5s linear infinite;@keyframes fade { from {opacity: 0} to {opacity: 1}};">
                <a href="#!" class="slideshow__link">
                    <picture>
                        <source media="(max-width: 767.98px)" srcset="<?= ROOT_ASSET_URL ?>client/assets/img/slideshow/item-1-md.png" />
                        <img src="<?= ROOT_UPLOAD_URL ?>banner/op1.jpg" alt="" class="slideshow__img" />
                    </picture>
                </a>
            </div>

            <div class="slideshow__item fade" style="display: none; animation: fade 1.5s linear infinite;@keyframes fade { from {opacity: 0} to {opacity: 1}}">
                <a href="#!" class="slideshow__link">
                    <picture>
                        <source media="(max-width: 767.98px)" srcset="<?= ROOT_ASSET_URL ?>client/assets/img/slideshow/item-1-md.png" />
                        <img src="<?= ROOT_UPLOAD_URL ?>banner/op2.jpg" alt="" class="slideshow__img" />
                    </picture>
                </a>
            </div>

            <div class="slideshow__item fade" style="display: none; animation: fade 1.5s linear infinite; @keyframes fade { from {opacity: 0} to {opacity: 1}}">
                <a href="#!" class="slideshow__link">
                    <picture>
                        <source media="(max-width: 767.98px)" srcset="<?= ROOT_ASSET_URL ?>client/assets/img/slideshow/item-1-md.png" />
                        <img src="<?= ROOT_UPLOAD_URL ?>banner/op3.jpg" alt="" class="slideshow__img" />
                    </picture>
                </a>
            </div>


        </div>
        <!-- <a style="position:absolute; left: 30px; top: 160px; font-size: 24px; padding: 5px;  cursor: pointer; color: #fff" class="prev" onclick="changeSlide(-1)">&#10094;</a>
            <a style="position:absolute; right: 30px; top: 160px; font-size: 24px; padding: 5px; cursor: pointer;  color: #fff" class="next" onclick="changeSlide(1)">&#10095;</a> -->
        <div class="slideshow__page">
            <span class="slideshow__num">1</span>
            <span class="slideshow__slider"></span>
            <span class="slideshow__num">5</span>
        </div>
    </div>
</div>

<script>
    let slideIndex = 0;
    showSlides();

    function showSlides() {
        const slides = document.getElementsByClassName("slideshow__item");

        // Hide all slides
        for (let i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }

        // Move to next slide
        slideIndex++;

        // Loop back to first slide if reach end
        if (slideIndex > slides.length) {
            slideIndex = 1;
        }

        // Display current slide
        slides[slideIndex - 1].style.display = "block";

        // Change slide every 2 seconds (2000 milliseconds)
        setTimeout(showSlides, 1500);
    }
</script>