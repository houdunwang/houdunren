@mobile
{{$data->withQueryString()->onEachSide(1)->links() }}
@endmobile

@desktop
{{$data->withQueryString()->links() }}
@enddesktop
