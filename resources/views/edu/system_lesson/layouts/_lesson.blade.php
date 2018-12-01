<div class="form-group">
    <label>标题</label>
    <input type="text" name="title" class="form-control" required value="{{old('title',$lesson['title']??'')}}">
</div>
<div class="form-group">
    <label>描述</label>
    <textarea name="description" class="form-control" rows="5" required>{{old('description',$lesson['description']??'')}}</textarea>
</div>
<div class="form-group">
    <label>课程编号</label>
    <input type="text" name="lessons" class="form-control" required value="{{old('lessons',$lesson['lessons']??'')}}">
</div>