<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Masonry</title>
    <style>
        .grid {
            margin: 20px auto;
        }
        .grid-item {
            margin-bottom: 10px;
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
        @foreach ($images as $image)
            <div class="grid-item">
                <img src="{{ $image->url }}" alt="image">
            </div>
        @endforeach
       {{-- <div class="grid-item">
          <img src="https://i.imgur.com/EpYbuG7.jpg" alt="image">
      </div>
      <div class="grid-item">
          <img src="https://i.imgur.com/kXUHDn5.jpg" alt="image">
      </div>
      <div class="grid-item">
          <img src="https://i.imgur.com/Qmz61wo.jpg" alt="image">
      </div>
      <div class="grid-item">
          <img src="https://i.imgur.com/aPia86B.jpg" alt="image">
      </div>
      <div class="grid-item">
          <img src="https://i.imgur.com/iQRKg2a.jpg" alt="image">
      </div>
      <div class="grid-item">
          <img src="https://i.imgur.com/XREWwIc.jpg" alt="image">
      </div>
      <div class="grid-item">
          <img src="https://i.imgur.com/MV9SvaP.jpg" alt="image">
      </div>
      <div class="grid-item">
          <img src="https://i.imgur.com/qjQ9XWl.jpg" alt="image">
      </div>
      <div class="grid-item">
          <img src="https://i.imgur.com/ZJ088Tk.jpg" alt="image">
      </div>
      <div class="grid-item">
          <img src="https://i.imgur.com/SuZLV2U.jpg" alt="image">
      </div>
      <div class="grid-item">
          <img src="https://i.imgur.com/71H2B0k.jpg" alt="image">
      </div>
      <div class="grid-item">
          <img src="https://i.imgur.com/vxOA4hg.jpg" alt="image">
      </div>
      <div class="grid-item">
          <img src="https://i.imgur.com/8kLXqdP.jpg" alt="image">
      </div> --}}
    </div> <!-- end grid -->

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

    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
    <script src="https://unpkg.com/infinite-scroll@3/dist/infinite-scroll.pkgd.min.js"></script>
    <script>
        var elem = document.querySelector('.grid');
        var msnry = new Masonry( elem, {
          itemSelector: '.grid-item',
          gutter: 10,
        });

        var elem2 = document.querySelector('.grid');
        var infScroll = new InfiniteScroll( '.grid', {
          path: '?page=@{{#}}',
          append: '.grid-item',
          outlayer: msnry,
          history: false,
          status: '.page-load-status',
        });
    </script>
</body>
</html>
