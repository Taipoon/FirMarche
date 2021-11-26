@php
if ($name === 'image1') {
    $modal = 'modal-1';
}
if ($name === 'image2') {
    $modal = 'modal-2';
}
if ($name === 'image3') {
    $modal = 'modal-3';
}
if ($name === 'image4') {
    $modal = 'modal-4';
}
@endphp

<div class="modal micromodal-slide" id="{{ $modal }}" aria-hidden="true">
  <div class="modal__overlay" tabindex="-1" data-micromodal-close>
    <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-1-title">
      <header class="modal__header">
        <h2 class="text-ls text-gray-700" id="{{ $modal }}-title">
          ファイルを選択してください
        </h2>
        <button type="button" class="modal__close" aria-label="Close modal" data-micromodal-close></button>
      </header>
      <main class="modal__content" id="{{ $modal }}-content">
        <div class="flex flex-wrap">
          @foreach ($images as $image)
            <div class="w-1/2 md:w-1/3 md:p-4 p-2">
              <div class="border rouded-md p-4">
                <img class="image" data-id="{{ $name }}_{{ $image->id }}"
                  data-file="{{ $image->filename }}" data-path="{{ asset('storage/products/') }}"
                  data-modal="{{ $modal }}" src="{{ asset('storage/products/' . $image->filename) }}"
                  alt="{{ $image->filename }}">
                <div class="text-gray-700">
                  {{ $image->title }}
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </main>
      <footer class="modal__footer">
        {{-- <button type="button" class="modal__btn modal__btn-primary">Continue</button> --}}
        <button type="button" class="modal__btn" data-micromodal-close aria-label="閉じる">閉じる</button>
      </footer>
    </div>
  </div>
</div>

{{-- <a data-micromodal-trigger="{{ $modal }}" href="javascript:;">ファイルを選択</a> --}}

<div class="flex justify-around items-center mb-4">
  <a data-micromodal-trigger="{{ $modal }}" href="javascript:;">開くボタン</a>
  <div class="w-1/4">
    <img id="{{ $name }}_thumbnail" src="">
  </div>
</div>
<input id="{{ $name }}_hidden" type="hidden" name="{{ $name }}" value="">