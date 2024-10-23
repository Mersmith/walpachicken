@if (!empty($p_elemento) && !empty($p_elemento->contenido))
    <div class="partials_contenedor_celebracion">
        <div class="titulo">
            <h2>BENEFICIOS DE TRABAJO</h2>
            <p>Descubre los beneficios por ser parte de nuestra familia.</p>
        </div>

        <!-- SLIDER -->
        <div class="swiper-container-wrapper">
            <div class="swiper SwiperBeneficios-{{ $p_elemento->id }}">
                <!-- SLIDER -->
                <div class="swiper-wrapper">
                    @foreach ($p_elemento->contenido as $elemento)
                        <div class="swiper-slide">
                            <div class="cabecera">
                                <div class="contenedor_icono">
                                    {!! $elemento['icono'] !!}
                                </div>
                                <h3>{{ $elemento['titulo'] }}</h3>
                            </div>
                            <p>{{ $elemento['descripcion'] }}</p>
                        </div>
                    @endforeach
                </div>

                <!-- CONTROL PAGINACION -->
                <div class="swiper-pagination"></div>
            </div>

            <!-- CONTROL BOTONES -->
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
                    spaceBetween: 10,
                }
            }
        });
    </script>
@endif
