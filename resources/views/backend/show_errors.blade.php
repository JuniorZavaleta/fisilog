@if (count($errors))
<div class="ui negative message">
  <i class="close icon"></i>
  <div class="header">
    Hey! Hay algunos errores.
  </div>
   <ul class="list">
      @foreach($errors->all() as $error)
      <li>{{$error}}</li>
      @endforeach
   </ul>
</div>
@endif

@push('scripts')
<script>
  $('.message .close').on('click', function() {
    $(this).closest('.message').transition('fade');
  });
</script>
@endpush
