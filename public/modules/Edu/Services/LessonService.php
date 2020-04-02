<?php

namespace Modules\Edu\Services;

use App\Models\Site;
use App\User;
use Illuminate\Support\Facades\DB;
use Modules\Edu\Entities\Lesson;

class LessonService
{
  /**
   * 添加课程
   * @param Site $site
   * @param User $user
   * @param array $data
   *
   * @return bool
   */
  public function create(Site $site, User $user, array $data)
  {
    $data['site_id'] = $site['id'];
    $data['user_id'] = $user['id'];
    $data['video_num'] = count($data['videos']);
    $lesson = Lesson::create($data);
    $lesson->tag()->sync($data['tags']);
    return $this->saveVideos($lesson, $data);
  }

  /**
   * 更新课程
   * @param Lesson $lesson
   * @param array $data
   *
   * @return void
   */
  public function update(Lesson $lesson, array $data)
  {
    $data['video_num'] = count($data['videos']);
    $lesson->fill($data)->save();
    $lesson->tag()->sync($data['tags']);
    return $this->saveVideos($lesson, $data);
  }

  /**
   * 添加或更新课程与视频
   * @param Lesson $lesson
   * @param array $data
   *
   * @return void
   */
  protected function saveVideos(Lesson $lesson, array $data)
  {
    foreach ($data['videos'] as $video) {
      if (!empty($video['title']) && !empty($video['path'])) {
        $video['site_id'] = site()['id'];
        $lesson->video()->updateOrCreate(['id' => $video['id'] ?? 0], $video);
      }
    }
    return true;
  }

  /**
   * 删除课程
   * @param Lesson $lesson
   *
   * @return void
   */
  public function delete(Lesson $lesson)
  {
    $lesson->tag()->detach();
    return $lesson->delete();
  }
}
