<div class="col-12 col-md-4 lesson mb-4 d-flex flex-column justify-content-between">
  <a href="{{ route('Edu.front.lesson.show',$lesson) }}" class="d-block shadow-sm lesson">
    <div class="card">
      <div class="card-body p-0"><img src="{{ $lesson['thumb'] }}"></div>
      <div class="card-body lesson-title">{{ $lesson['title'] }}</div>
      <div class="card-footer d-flex justify-content-between text-secondary small bg-light">
        <span>开始学习</span>
        <span>
          <i aria-hidden="true" class="fa fa-film ml-3"></i>
          {{ $lesson['video_num'] }}节课
        </span>
      </div>
    </div>
  </a>
</div>
