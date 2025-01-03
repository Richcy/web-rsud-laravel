<div class="space-xs visible-xs"></div>
<div class="container banner">
    <!-- Breadcumb -->
    <div class="breadcrumb-part">
        <a href="{{ url('/') }}">Home</a>
        <span><i class="fa fa-angle-right"></i></span>
        <a href="javascript:void(0);">Artikel</a>
    </div>
    <!-- End breadcumb -->
</div>

<main id="main">
    <section id="content" class="main-page">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h1 class="title-page">Artikel RSUD Cimacan</h1>
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
                                                    @foreach ($articleCategories as $ac)
                                                    <option value="{{ $ac->id }}" {{ old('category', $categorySelected ?? '') == $ac->id ? 'selected' : '' }}>
                                                        {{ $ac->name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Nama Artikel</label>
                                                <input name="s" type="text" class="form-control input-search-article" placeholder="Masukkan keyword" value="{{ $s }}">
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
                <!-- Looping article -->
                @forelse ($articles as $article)
                <div class="col-listbox">
                    <div class="listboxd-wrap">
                        @php
                        $imageUrl = $article->img ? asset('storage/' . $article->img) : asset('storage/default-image.jpg');
                        @endphp
                        <a href="{{ route('article.detail', ['id' => $article->id]) }}" class="listboxd-img" style="background-image: url('{{ $imageUrl }}')">

                            <span style="opacity: 0;">
                                {{ $article->title }}
                            </span>
                        </a>
                        <div class="listboxd-content">
                            <a href="{{ route('article.detail', ['id' => $article->id]) }}" class="listboxd-title min-heigt-title">
                                {{ $article->title }}
                            </a>
                            <div class="listboxd-desc" id="desc_card">
                                {{ $article->sub_desc ? substr($article->sub_desc, 0, 150) : substr($article->description, 0, 150) }}...
                            </div>
                            <div class="row up2 top-footer-card">
                                <div class="col-xs-6 pad0">
                                    <div class="listboxd-category">
                                        {{ $article->category_name }}
                                    </div>
                                </div>
                                <div class="col-xs-6 pad0">
                                    <div class="listboxd-read">
                                        <a href="{{ route('article.detail', ['id' => $article->id]) }}">Detail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <!-- End looping article -->
                <p class="empty-data">Data artikel tidak tersedia</p>
                @endforelse
            </div>

        </div>
    </section>
</main>