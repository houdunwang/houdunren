@extends('layouts.member')

@section('content')
<form action="{{ route('member.email.store') }}" method="post" @submit.prevent="submit">
    @csrf
    <div class="card">
        <div class="card-header bg-white">
            绑定邮箱
        </div>
        <div class="card-body">
            <send-code title="邮箱" name="email" :code.sync="code" :email.sync="email"
                action="{{ route('member.email.code') }}">
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
            email:'',
        },
        methods:{
            submit(){
                axios.post("{{ route('member.email.store') }}",this.$data).then(function(){
                    location.reload(true);
                })
            }
        }
    }
</script>
@endpush
