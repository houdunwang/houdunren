<div class="form-group">
    <label>名称</label>
    <input type="text" name="title" class="form-control" required value="{{old('title',$lesson['title']??'')}}" placeholder="输入系统课程名称">
</div>
<div class="form-group">
    <label>描述</label>
    <textarea name="description" class="form-control" rows="5" required placeholder="输入课程介绍，字数不能小于100字">{{old('description',$lesson['description']??'')}}</textarea>
</div>
<div class="form-group">
    <label>课程编号</label>
    <input type="text" name="lessons" class="form-control" required value="{{old('lessons',$lesson['lessons']??'')}}" placeholder="输入课程编号，用逗号连接">
</div>