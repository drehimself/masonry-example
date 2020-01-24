<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Horizontal Masonry</title>
    <style>
        body {
  margin: 0;
  overflow-x: hidden;
}

.grid {
  display: flex;
  flex-wrap: wrap;
}

.grid::after {
  content: '';
  flex-grow: 999999999;
}

.grid > figure {
  margin: 2px;
  background-color: white;
  position: relative;
}

.grid > figure > i {
  display: block;
}

.grid > figure > img {
  position: absolute;
  top: 0;
  width: 100%;
  vertical-align: bottom;
}

.loader-ellips {
  font-size: 20px; /* change size here */
  position: relative;
  width: 4em;
  height: 1em;
  margin: 10px auto;
}

.loader-ellips__dot {
  display: block;
  width: 1em;
  height: 1em;
  border-radius: 0.5em;
  background: #555; /* change color here */
  position: absolute;
  animation-duration: 0.5s;
  animation-timing-function: ease;
  animation-iteration-count: infinite;
}

.loader-ellips__dot:nth-child(1),
.loader-ellips__dot:nth-child(2) {
  left: 0;
}
.loader-ellips__dot:nth-child(3) { left: 1.5em; }
.loader-ellips__dot:nth-child(4) { left: 3em; }

@keyframes reveal {
  from { transform: scale(0.001); }
  to { transform: scale(1); }
}

@keyframes slide {
  to { transform: translateX(1.5em) }
}

.loader-ellips__dot:nth-child(1) {
  animation-name: reveal;
}

.loader-ellips__dot:nth-child(2),
.loader-ellips__dot:nth-child(3) {
  animation-name: slide;
}

.loader-ellips__dot:nth-child(4) {
  animation-name: reveal;
  animation-direction: reverse;
}
    </style>
</head>
<body>
    <div class="grid">

    <!--
    "flexGrow":      photo.width * 100 / photo.height,
    "flexBasis":     photo.width * 240 / photo.height,
    "paddingBottom": photo.height / photo.width * 100.0,
    -->

    @foreach ($images as $image)
        <figure style="flex-grow:{{ $image->width * 100 / $image->height }}; flex-basis: {{ $image->width * 240 / $image->height }}px">
        <i style="padding-bottom:{{ $image->height / $image->width * 100}}%"></i>
        <img src="{{ $image->url }}" alt="placeholder">
    </figure>
    @endforeach

    {{-- <figure style="flex-grow:66.667; flex-basis:160px;">
        <i style="padding-bottom:150%"></i>
        <img src="http://placehold.it/400x600" alt="placeholder">
    </figure>

    <figure style="flex-grow:150; flex-basis:360px;">
        <i style="padding-bottom:66.667%"></i>
        <img src="http://placehold.it/600x400" alt="placeholder">
    </figure>

    <figure style="flex-grow:106.667; flex-basis:256px;">
        <i style="padding-bottom:93.75%"></i>
        <img src="http://placehold.it/512x480" alt="placeholder">
    </figure>

    <figure style="flex-grow:233.333; flex-basis:560px;">
        <i style="padding-bottom:42.857%"></i>
        <img src="http://placehold.it/700x300" alt="placeholder">
    </figure>

    <figure style="flex-grow:100; flex-basis:240px;">
        <i style="padding-bottom:100%"></i>
        <img src="http://placehold.it/640x640" alt="placeholder">
    </figure>

    <figure style="flex-grow:62.5; flex-basis:150px;">
        <i style="padding-bottom:160%"></i>
        <img src="http://placehold.it/400x640" alt="placeholder">
    </figure>

    <figure style="flex-grow:82.581; flex-basis:198px;">
        <i style="padding-bottom:121.094%"></i>
        <img src="http://placehold.it/512x620" alt="placeholder">
    </figure>

    <figure style="flex-grow:128.6407767; flex-basis:308.7378641px;">
        <i style="padding-bottom:77.73584906%"></i>
        <img src="http://placehold.it/530x412" alt="placeholder">
    </figure>

    <figure style="flex-grow:127.1052632; flex-basis:305.0526316px;">
        <i style="padding-bottom:78.67494824%"></i>
        <img src="http://placehold.it/483x380" alt="placeholder">
    </figure>

    <figure style="flex-grow:153.168; flex-basis:368px;">
        <i style="padding-bottom:65.288%"></i>
        <img src="http://placehold.it/556x363" alt="placeholder">
    </figure>

    <figure style="flex-grow:97.101; flex-basis:233px;">
        <i style="padding-bottom:102.985%"></i>
        <img src="http://placehold.it/603x621" alt="placeholder">
    </figure>

    <figure style="flex-grow:236.842; flex-basis:568px;">
        <i style="padding-bottom:42.222%"></i>
        <img src="http://placehold.it/585x247" alt="placeholder">
    </figure>

    <figure style="flex-grow:232.02; flex-basis:557px;">
        <i style="padding-bottom:43.1%"></i>
        <img src="http://placehold.it/942x406" alt="placeholder">
    </figure>

    <figure style="flex-grow:184.076; flex-basis:442px;">
        <i style="padding-bottom:54.325%"></i>
        <img src="http://placehold.it/1156x628" alt="placeholder">
    </figure>

    <figure style="flex-grow:220; flex-basis:528px;">
        <i style="padding-bottom:45.455%"></i>
        <img src="http://placehold.it/1089x495" alt="placeholder">
    </figure>

    <figure style="flex-grow:431.25; flex-basis:1035px;">
        <i style="padding-bottom:23.188%"></i>
        <img src="http://placehold.it/1035x240" alt="placeholder">
    </figure> --}}

</div>

<div class="page-load-status">
      <div class="loader-ellips infinite-scroll-request">
        <span class="loader-ellips__dot"></span>
        <span class="loader-ellips__dot"></span>
        <span class="loader-ellips__dot"></span>
        <span class="loader-ellips__dot"></span>
      </div>
      <p class="infinite-scroll-last">End of content</p>
      <p class="infinite-scroll-error">No more pages to load</p>
    </div>

    <script src="https://unpkg.com/infinite-scroll@3/dist/infinite-scroll.pkgd.min.js"></script>
    <script>
        var elem2 = document.querySelector('.grid');
        var infScroll = new InfiniteScroll( '.grid', {
          path: '?page=@{{#}}',
          append: 'figure',
          history: false,
          status: '.page-load-status',
        });
    </script>

</body>
</html>
