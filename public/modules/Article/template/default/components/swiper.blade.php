@inject('swiper','Modules\Article\Entities\Swiper')
@php
$swiper = $swiper->find($id)
@endphp
<div class="swiper-container">
    <div class="swiper-wrapper">
        @foreach($swiper->items as $item)
        <a href="#" class="swiper-slide">
            <img src="{{ $item['img'] }}" class="w-full" />
        </a>
        @endforeach
    </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination"></div>
    <!-- Add Arrows -->
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
</div>

@push('scripts')
<script>
    setTimeout(function(){
        new Swiper ('.swiper-container', {
            autoplay: {
                delay: {{ $delay??3000 }},
            },
            pagination: {
                el: '.swiper-pagination',
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev'
            }
  })
})
</script>
@endpush

@push('styles')
<style>
    .swiper-container {
        width: <?php echo $swiper['width'];
        ?>;
        height: <?php echo $swiper['height'];
        ?>;
    }
</style>
@endpush
