@if (!empty($p_elemento) && !empty($p_elemento->contenido))
    <div class="partials_contenedor_celebracion">
        <div class="titulo">
            <h2>Beneficios de trabajo</h2>
            <p>Descubre los beneficios por ser parte de nuestra familia.</p>
        </div>

        <!-- Contenedor principal del carrusel y los botones -->
        <div class="swiper-container-wrapper">
            <div class="swiper SwiperBeneficios-{{ $p_elemento->id }}">
                <!-- SLIDER -->
                <div class="swiper-wrapper">
                    @foreach ($p_elemento->contenido as $elemento)
                        <div class="swiper-slide">
                            <div class="cabecera">
                                {!! $elemento['icono'] !!}
                                <p>{{ $elemento['titulo'] }}</p>
                            </div>
                            <p>{{ $elemento['descripcion'] }}</p>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>

            <!-- Botones fuera del contenedor de Swiper -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </div>

    <script>
        var swiper = new Swiper('.SwiperBeneficios-{{ $p_elemento->id }}', {
            slidesPerView: 4,
            spaceBetween: 10,
            loop: false,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: '.SwiperBeneficios-{{ $p_elemento->id }} .swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                1000: {
                    slidesPerView: 4,
                    spaceBetween: 10,
                },
                500: {
                    slidesPerView: 1,
                    spaceBetween: 0,
                }
            }
        });
    </script>
@endif
