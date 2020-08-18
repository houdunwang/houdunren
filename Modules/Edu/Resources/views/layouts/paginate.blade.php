@mobile
{{$data->withQueryString()->onEachSide(0)->links() }}
@endmobile

@desktop
{{$data->withQueryString()->links() }}
@enddesktop
