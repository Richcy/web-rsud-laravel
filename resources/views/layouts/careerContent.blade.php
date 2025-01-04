<div class="space-xs visible-xs"></div>
<div class="container banner">
    <!-- Breadcumb -->
    <div class="breadcrumb-part">
        <a href="{{ url('/') }}">Home</a>
        <span><i class="fa fa-angle-right"></i></span>
        <a href="javascript:void(0);">Karir</a>
    </div>
    <!-- End breadcumb -->
</div>

<main id="main">
    <section id="content" class="main-page">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h1 class="title-page">Karir RSUD Cimacan</h1>
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
                                                <label for="">Nama Karir</label>
                                                <input name="s" type="text" class="form-control input-search-career" placeholder="Masukkan keyword" value="{{ $s }}">
                                            </div>
                                            <button type="submit" class="btn btn-primary" style="background-color: #01923f; border-color: #01923f;">Submit</button>
                                            @if ($s != '')
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
                <!-- Looping career -->
                @forelse ($careers as $career)
                <div class="col-listbox">
                    <div class="listboxd-wrap">
                        @php
                        $imageUrl = $career->img ? asset('storage/' . $career->img) : asset('storage/default-image.jpg');
                        @endphp
                        <a href="{{ route('career.detail', ['id' => $career->id]) }}" class="listboxd-img" style="background-image: url('{{ $imageUrl }}')">

                            <span style="opacity: 0;">
                                {{ $career->title }}
                            </span>
                        </a>
                        <div class="listboxd-content">
                            <a href="{{ route('career.detail', ['id' => $career->id]) }}" class="listboxd-title min-heigt-title">
                                {{ $career->title }}
                            </a>
                            <div class="listboxd-desc" id="desc_card">
                                {{ $career->sub_desc ? substr($career->sub_desc, 0, 150) : substr($career->description, 0, 150) }}...
                            </div>
                            <div class="row up2 top-footer-card">
                                <div class="col-xs-6 pad0">
                                </div>
                                <div class="col-xs-6 pad0">
                                    <div class="listboxd-read">
                                        <a href="{{ route ('career.detail', ['id' => $career->id]) }}">Detail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <!-- End looping career -->
                <p class="empty-data">Data Karir tidak tersedia</p>
                @endforelse
            </div>

        </div>
    </section>
</main>