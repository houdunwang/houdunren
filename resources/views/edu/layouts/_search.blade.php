<form class="js-focus-state input-group u-form mb-3" onsubmit="return false;">
    <div class="input-group input-group-sm">
        <input type="text" class="form-control rounded-0" placeholder="输入搜索关键字" name="w" aria-label="Recipient's username" aria-describedby="basic-addon2">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" style="border-color: #ccd1d6" type="button" onclick="search('topic',this)">贴子
            </button>
            <button class="btn btn-outline-secondary rounded-0" style="border-color: #ccd1d6" type="button" onclick="search('video',this)">视频
            </button>
        </div>
    </div>
</form>
@push('js')
    <script>
        function search(t,obj) {
            w =$(obj).parent().prev('input').val();
            location.href = "{{route('edu.search')}}?w=" + w + "&t=" + t;
        }
    </script>
@endpush