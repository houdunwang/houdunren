@extends('layouts.member')

@section('content')
<form action="{{ route('member.email.store') }}" method="post" @submit.prevent="submit">
    @csrf
    <div class="card">
        <div class="card-header bg-white">
            手机绑定
        </div>
        <div class="card-body">
            <send-code title="手机号" name="mobile" :code.sync="code" :mobile.sync="mobile">
            </send-code>
        </div>

        <div class="card-footer bg-white">
            <button class="btn btn-primary">保存</button>
        </div>
    </div>
</form>

@endsection

@push('scripts')
<script>
    window.vue={
        data:{
            code:'',
            mobile:'',
        },
        methods:{
            submit(){
                axios.post("{{ route('member.mobile.store') }}",this.$data).then(function(){

                })
            }
        }
    }
</script>
@endpush
