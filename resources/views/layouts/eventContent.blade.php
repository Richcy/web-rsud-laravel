<div class="space-xs visible-xs"></div>
<div class="container banner">
    <!-- Breadcumb -->
    <div class="breadcrumb-part">
        <a href="{{ url('/') }}">Home</a>
        <span><i class="fa fa-angle-right"></i></span>
        <a href="javascript:void(0);">Event</a>
    </div>
    <!-- End breadcumb -->
</div>

<main id="main">
    <section id="content" class="main-page">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h1 class="title-page">Event RSUD Cimacan</h1>
            </div>
            <!-- Search Section -->
            <div class="row-ln" style="display: table;">
                <div class="search-box">
                    <div class="ln-wrap">
                        <div class="ln-content">
                            <div class="ln-desc">
                                <form action="{{ url()->current() }}" method="GET">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Kategori</label>
                                                <select class="form-control category" id="" name="category">
                                                    <option value="">-- Semua Kategori --</option>
                                                    @foreach ($eventCategories as $ec)
                                                    <option value="{{ $ec->id }}" {{ old('category', $categorySelected ?? '') == $ec->id ? 'selected' : '' }}>
                                                        {{ $ec->name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Nama Event</label>
                                                <input name="s" type="text" class="form-control input-search-event" placeholder="Masukkan keyword" value="{{ $s }}">
                                            </div>
                                            <button type="submit" class="btn btn-primary" style="background-color: #01923f; border-color: #01923f;">Submit</button>
                                            @if ($categorySelected != '' || $s != '')
                                            <a href="{{ url()->current() }}" class="btn btn-primary button-reset">Reset</a>
                                            @endif


                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Search Section -->

            <div class="row-listbox">
                <!-- Looping event -->
                @forelse ($events as $event)
                <div class="col-listbox">
                    <div class="listboxd-wrap">
                        @php
                        $imageUrl = $event->img ? asset('storage/' . $event->img) : asset('storage/default-image.jpg');
                        @endphp
                        <a href="{{ route('event.detail', ['id' => $event->id]) }}" class="listboxd-img" style="background-image: url('{{ $imageUrl }}')">

                            <span style="opacity: 0;">
                                {{ $event->title }}
                            </span>
                        </a>
                        <div class="listboxd-content">
                            <div class="row down1" style="height:50px;">
                                <div class="col-xs-12" style="padding-left:0;">
                                    <div class="listboxd-date">
                                        {{ date('d M Y', strtotime($event->start_date)) }} - {{ date('d M Y', strtotime($event->end_date)) }}
                                    </div>
                                    <div class="listboxd-location">
                                        <i class="fa fa-map-marker"></i>
                                        {{ $event->location ? substr($event->location, 0, 35) . '....' : '-' }}
                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('event.detail', ['id' => $event->id]) }}" class="listboxd-title min-heigt-title">
                                {{ $event->title }}
                            </a>
                            <div class="listboxd-desc" id="desc_card">
                                {{ $event->sub_desc ? substr($event->sub_desc, 0, 150) : substr($event->description, 0, 150) }}...
                            </div>
                            <div class="row up2 top-footer-card">
                                <div class="col-xs-6 pad0">
                                    <div class="listboxd-category">
                                        {{ $event->category_name }}
                                    </div>
                                </div>
                                <div class="col-xs-6 pad0">
                                    <div class="listboxd-read">
                                        <a href="{{ route('event.detail', ['id' => $event->id]) }}">Detail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <!-- End looping event -->
                <p class="empty-data">Data event tidak tersedia</p>
                @endforelse
            </div>

        </div>
    </section>
</main>