<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Portal Berita') | Portal Berita</title>
    <style>
        :root {
            --primary: #0f766e;
            --primary-hover: #115e59;
            --bg: #f8fafc;
            --surface: #ffffff;
            --text: #0f172a;
            --muted: #64748b;
            --border: #e2e8f0;
            --danger: #dc2626;
            --success: #15803d;
        }

        body {
            font-family: system-ui, -apple-system, sans-serif;
            background-color: var(--bg);
            color: var(--text);
            max-width: 980px;
            margin: 0 auto;
            padding: 1.5rem 1rem;
            line-height: 1.6;
        }

        .nav {
            display: flex;
            gap: 1.25rem;
            align-items: center;
            flex-wrap: wrap;
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 0.9rem 1.25rem;
        }

        .nav a {
            text-decoration: none;
            color: var(--muted);
            font-weight: 500;
        }

        .nav a:hover,
        .nav a.active {
            color: var(--primary);
            font-weight: 700;
        }

        .right {
            margin-left: auto;
            display: flex;
            gap: 0.9rem;
            align-items: center;
            flex-wrap: wrap;
        }

        .inline {
            display: inline;
        }

        .card {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 1.25rem;
        }

        .row {
            display: grid;
            gap: 1rem;
            grid-template-columns: repeat(auto-fit, minmax(270px, 1fr));
        }

        .muted {
            color: var(--muted);
        }

        .flash {
            background: #f0fdf4;
            border: 1px solid #bbf7d0;
            color: var(--success);
            padding: 0.65rem 0.9rem;
            border-radius: 8px;
            margin: 0.75rem 0;
        }

        .error {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: var(--danger);
            padding: 0.65rem 0.9rem;
            border-radius: 8px;
            margin: 0.75rem 0;
        }

        form label {
            display: block;
            margin-top: 0.85rem;
            margin-bottom: 0.3rem;
            font-weight: 600;
        }

        input[type=text],
        input[type=url],
        input[type=email],
        input[type=password],
        textarea {
            width: 100%;
            padding: 0.6rem 0.75rem;
            border: 1px solid var(--border);
            border-radius: 8px;
            box-sizing: border-box;
            background: var(--surface);
            color: var(--text);
            font-family: inherit;
        }

        input:focus,
        textarea:focus {
            outline: 2px solid #99f6e4;
            border-color: var(--primary);
        }

        button,
        .btn {
            background: var(--primary);
            color: #ffffff;
            border: 1px solid var(--primary);
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
            cursor: pointer;
        }

        button:hover,
        .btn:hover {
            background: var(--primary-hover);
            border-color: var(--primary-hover);
        }

        .btn-danger {
            background: var(--danger);
            border-color: var(--danger);
        }

        .btn-danger:hover {
            background: #b91c1c;
            border-color: #b91c1c;
        }

        .btn-secondary {
            background: #f1f5f9;
            color: var(--text);
            border-color: var(--border);
        }

        .btn-secondary:hover {
            background: #e2e8f0;
        }

        .pagination {
            display: flex;
            gap: 0.35rem;
            list-style: none;
            padding: 0;
            margin-top: 1rem;
            flex-wrap: wrap;
        }

        .pagination li a,
        .pagination li span {
            display: inline-block;
            padding: 0.4rem 0.7rem;
            border: 1px solid var(--border);
            border-radius: 6px;
            text-decoration: none;
            color: var(--text);
        }

        .pagination li.active span {
            background: var(--primary);
            color: #ffffff;
            border-color: var(--primary);
            font-weight: 700;
        }
    </style>
</head>
<body>
    @include('partials.nav')
    <main style="margin-top: 1.25rem;">
        @yield('content')
    </main>
</body>
</html>