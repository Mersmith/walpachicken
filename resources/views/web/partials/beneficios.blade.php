@if (!empty($p_elemento) && !empty($p_elemento->contenido))
    <div class="partials_contenedor_celebracion">
        <div class="swiper SwiperBeneficios-{{ $p_elemento->id }}">
            <!-- SLIDER -->
            <div class="swiper-wrapper">
                @foreach ($p_elemento->contenido as $elemento)
                    <div class="swiper-slide">
                        <p>{{ $elemento['titulo'] }}</p>
                    </div>
                @endforeach
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>
    </div>

    <script>
        var swiper = new Swiper('.SwiperBeneficios-{{ $p_elemento->id }}', {
            slidesPerView: 5,  // Por defecto, se muestran 5 elementos
            spaceBetween: 10,  // Espacio entre los elementos
            loop: false,  // Carrusel en bucle
            navigation: {
                nextEl: '.SwiperBeneficios-{{ $p_elemento->id }} .swiper-button-next',
                prevEl: '.SwiperBeneficios-{{ $p_elemento->id }} .swiper-button-prev',
            },
            pagination: {
                el: '.SwiperBeneficios-{{ $p_elemento->id }} .swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                1000: {
                    slidesPerView: 5,  // Mostrar 3 elementos en pantallas mayores a 1000px
                    spaceBetween: 10,
                },
                500: {
                    slidesPerView: 1,  // Mostrar 1 elemento en pantallas menores a 500px
                    spaceBetween: 0,
                }
            }
        });
    </script>
@endif