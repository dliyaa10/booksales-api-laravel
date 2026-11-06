<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - BookSales</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f5fb;
            color: #20233a;
        }

        .sidebar {
            position: fixed;
            width: 225px;
            height: 100vh;
            background: #20213b;
            color: white;
            padding: 28px 20px;
        }

        .brand {
            font-size: 22px;
            font-weight: bold;
        }

        .brand span {
            color: #a99aff;
        }

        .sidebar p {
            color: #a9abc4;
            font-size: 13px;
            margin-top: 8px;
        }

        .menu {
            margin-top: 42px;
        }

        .menu a {
            display: block;
            padding: 14px;
            margin-bottom: 10px;
            color: #dedff0;
            text-decoration: none;
            border-radius: 9px;
            transition: background 0.2s ease, color 0.2s ease;
        }

        .menu a.active {
            background: #7160dc;
            color: #ffffff;
        }

        .menu a:hover:not(.active) {
            background: #393956;
            color: #ffffff;
        }

        main {
            margin-left: 225px;
            padding: 34px;
        }

        .top {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        h1 {
            margin: 0;
            font-size: 28px;
        }

        .muted {
            color: #85869e;
            font-size: 14px;
        }

        .profile {
            background: white;
            padding: 12px 16px;
            border-radius: 10px;
            font-size: 14px;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 20px;
            margin: 28px 0;
        }

        .card, .panel {
            background: white;
            padding: 23px;
            border-radius: 15px;
            box-shadow: 0 5px 22px #24204a08;
        }

        .number {
            font-size: 30px;
            font-weight: bold;
            margin-top: 12px;
        }

        .icon {
            color: #7160dc;
            font-size: 22px;
        }

        .section-title {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            margin-bottom: 18px;
        }

        h2 {
            font-size: 19px;
            margin: 0 0 6px;
        }

        .content-grid {
            display: grid;
            grid-template-columns: minmax(0, 1.5fr) minmax(220px, 1fr);
            gap: 20px;
            margin-bottom: 25px;
            align-items: start;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            text-align: left;
            padding: 14px 10px;
            border-bottom: 1px solid #eeeef5;
            font-size: 13px;
        }

        th {
            color: #85869e;
            font-weight: normal;
        }

        .tag {
            display: inline-block;
            padding: 6px 10px;
            border-radius: 20px;
            color: #5e4ac4;
            background: #f0edff;
        }

        input {
            display: block;
            width: 100%;
            padding: 12px;
            margin: 10px 0 16px;
            border: 1px solid #dedfec;
            border-radius: 8px;
            font-size: 14px;
        }

        button {
            background: #7160dc;
            color: white;
            border: none;
            padding: 12px 16px;
            border-radius: 8px;
            cursor: pointer;
            width: 100%;
            font-weight: bold;
        }

        button:hover {
            background: #5948c4;
        }

        .success {
            padding: 14px;
            background: #e5f8ec;
            color: #217644;
            border-radius: 9px;
            margin-top: 22px;
        }

        .errors {
            background: #fff0f0;
            color: #b42318;
            border-radius: 9px;
            padding: 12px 28px;
            margin-top: 16px;
        }

        .empty {
            color: #9293a6;
            padding: 20px 0;
            font-size: 14px;
        }

        /* Tombol Edit dan Delete */
        .actions {
            display: flex;
            gap: 6px;
            align-items: center;
        }

        .actions button {
            width: auto;
            padding: 7px 10px;
            font-size: 12px;
        }

        .btn-edit {
            background: #7160dc;
        }

        .btn-delete {
            background: #dc5555;
        }

        .btn-delete:hover {
            background: #bd3737;
        }

        .edit-form {
            display: none;
            min-width: 150px;
        }

        .edit-form input {
            margin: 0 0 8px;
            padding: 8px;
        }

        .btn-save {
            background: #26965a;
        }

        .btn-cancel {
            background: #85869e;
        }

        .edit-form .actions {
            display: flex;
        }

        .edit-form .actions button {
            flex: 1;
        }

        @media (max-width: 850px) {
            .sidebar {
                position: static;
                width: 100%;
                height: auto;
            }

            .menu {
                margin-top: 20px;
                display: flex;
                gap: 8px;
            }

            .menu a {
                margin: 0;
            }

            main {
                margin-left: 0;
                padding: 20px;
            }

            .content-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 500px) {
            .cards {
                grid-template-columns: 1fr;
            }

            .top {
                align-items: flex-start;
                gap: 12px;
                flex-direction: column;
            }

            .panel {
                padding: 16px;
                overflow-x: auto;
            }
        }
    </style>
</head>

<body>

<aside class="sidebar">
    <div class="brand">Book<span>Sales.</span></div>
    <p>MANAGEMENT SYSTEM</p>

    <nav class="menu">
        <a href="{{ route('admin') }}">Dashboard</a>
        <a href="#genres">Genre</a>
        <a href="#authors">Author</a>
    </nav>
</aside>

<main>

    <div class="top">
        <div>
            <h1>Dashboard</h1>
            <p class="muted">Selamat datang di panel administrasi BookSales.</p>
        </div>

        <div class="profile">Admin</div>
    </div>

    @if (session('success'))
        <div class="success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="errors">
            <strong>Periksa kembali input kamu:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="cards">
        <div class="card">
            <div class="icon">Total Genre</div>
            <div class="number">{{ $genres->count() }}</div>
            <p class="muted">Genre tersimpan di database</p>
        </div>

        <div class="card">
            <div class="icon">Total Author</div>
            <div class="number">{{ $authors->count() }}</div>
            <p class="muted">Author tersimpan di database</p>
        </div>
    </div>

    <!-- GENRE -->
    <section id="genres" class="content-grid">

        <div class="panel">
            <div class="section-title">
                <div>
                    <h2>Daftar Genre</h2>
                    <span class="muted">Data genre buku</span>
                </div>

                <span class="tag">{{ $genres->count() }} data</span>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Genre</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($genres as $genre)
                        <tr>
                            <td>{{ $genre->id }}</td>

                            <td>
                                <span class="name-display">
                                    {{ $genre->name }}
                                </span>

                                <form
                                    class="edit-form"
                                    action="{{ route('admin.genres.update', $genre->id) }}"
                                    method="POST"
                                >
                                    @csrf
                                    @method('PUT')

                                    <input
                                        type="text"
                                        name="name"
                                        value="{{ $genre->name }}"
                                        required
                                    >

                                    <div class="actions">
                                        <button type="submit" class="btn-save">
                                            Simpan
                                        </button>

                                        <button
                                            type="button"
                                            class="btn-cancel"
                                            onclick="cancelEdit(this)"
                                        >
                                            Batal
                                        </button>
                                    </div>
                                </form>
                            </td>

                            <td>
                                <span class="tag">Aktif</span>
                            </td>

                            <td>
                                <div class="actions">
                                    <button
                                        type="button"
                                        class="btn-edit"
                                        onclick="editRow(this)"
                                    >
                                        Edit
                                    </button>

                                    <form
                                        action="{{ route('admin.genres.destroy', $genre->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus genre ini?')"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn-delete">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="empty">
                                Belum ada data genre.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="panel">
            <h2>Tambah Genre</h2>
            <p class="muted">Masukkan genre buku baru.</p>

            <form action="{{ route('admin.genres.store') }}" method="POST">
                @csrf

                <label for="genre-name">Nama Genre</label>

                <input
                    id="genre-name"
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="Contoh: Fantasy"
                    required
                >

                <button type="submit">+ Tambah Genre</button>
            </form>
        </div>

    </section>

    <!-- AUTHOR -->
    <section id="authors" class="content-grid">

        <div class="panel">
            <div class="section-title">
                <div>
                    <h2>Daftar Author</h2>
                    <span class="muted">Data penulis buku</span>
                </div>

                <span class="tag">{{ $authors->count() }} data</span>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Author</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($authors as $author)
                        <tr>
                            <td>{{ $author->id }}</td>

                            <td>
                                <span class="name-display">
                                    {{ $author->name }}
                                </span>

                                <form
                                    class="edit-form"
                                    action="{{ route('admin.authors.update', $author->id) }}"
                                    method="POST"
                                >
                                    @csrf
                                    @method('PUT')

                                    <input
                                        type="text"
                                        name="name"
                                        value="{{ $author->name }}"
                                        required
                                    >

                                    <div class="actions">
                                        <button type="submit" class="btn-save">
                                            Simpan
                                        </button>

                                        <button
                                            type="button"
                                            class="btn-cancel"
                                            onclick="cancelEdit(this)"
                                        >
                                            Batal
                                        </button>
                                    </div>
                                </form>
                            </td>

                            <td>
                                <span class="tag">Aktif</span>
                            </td>

                            <td>
                                <div class="actions">
                                    <button
                                        type="button"
                                        class="btn-edit"
                                        onclick="editRow(this)"
                                    >
                                        Edit
                                    </button>

                                    <form
                                        action="{{ route('admin.authors.destroy', $author->id) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus author ini?')"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn-delete">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="empty">
                                Belum ada data author.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="panel">
            <h2>Tambah Author</h2>
            <p class="muted">Masukkan nama penulis baru.</p>

            <form action="{{ route('admin.authors.store') }}" method="POST">
                @csrf

                <label for="author-name">Nama Author</label>

                <input
                    id="author-name"
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="Contoh: Andrea Hirata"
                    required
                >

                <button type="submit">+ Tambah Author</button>
            </form>
        </div>

    </section>

</main>

<script>
    // Mengaktifkan menu sidebar
    const menuLinks = document.querySelectorAll('.menu a');

    function updateActiveMenu() {
        const hash = window.location.hash;
        let activeMenu = 'dashboard';

        if (hash === '#genres') {
            activeMenu = 'genres';
        } else if (hash === '#authors') {
            activeMenu = 'authors';
        }

        menuLinks.forEach(link => {
            const href = link.getAttribute('href');

            const isActive =
                (activeMenu === 'dashboard' && !href.startsWith('#')) ||
                href === '#' + activeMenu;

            link.classList.toggle('active', isActive);
        });
    }

    menuLinks.forEach(link => {
        link.addEventListener('click', function () {
            const href = this.getAttribute('href');

            if (href.startsWith('#')) {
                menuLinks.forEach(item => {
                    item.classList.remove('active');
                });

                this.classList.add('active');
            }
        });
    });

    window.addEventListener('hashchange', updateActiveMenu);
    updateActiveMenu();


    // Menampilkan form edit
    function editRow(button) {
        const row = button.closest('tr');

        row.querySelector('.name-display').style.display = 'none';
        row.querySelector('.edit-form').style.display = 'block';

        button.style.display = 'none';
    }

    // Membatalkan edit
    function cancelEdit(button) {
        const row = button.closest('tr');

        row.querySelector('.name-display').style.display = 'inline';
        row.querySelector('.edit-form').style.display = 'none';

        row.querySelector('.btn-edit').style.display = 'inline-block';
    }
</script>

</body>
</html>