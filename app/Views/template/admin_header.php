<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?? 'Dashboard Admin' ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url('/style.css'); ?>">
</head>
<body>

<div class="container">
  <!-- Header -->
      <header>
        <h1>Admin Controllers</h1>
        </header>

  <div class="row">
   <!-- Navbar -->
    <nav class="navbar navbar-expand-md px-4 mb-4">
        <div class="container-fluid px-0 ">
            <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#adminNavbar" aria-controls="adminNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon text-white"></span>
            </button>
            <div class="collapse navbar-collapse" id="adminNavbar">
            <ul class="navbar-nav me-auto mb-2 mb-md-0 text-white">
                <li class="nav-item">
                <a class="nav-link text-white" href="<?= base_url('/admin/artikel'); ?>">Dashboard</a>
                </li>
                <li class="nav-item">
                <a class="nav-link text-white" href="<?= base_url('/admin/edit'); ?>">Edit</a>
                </li>
                <li class="nav-item">
                <a class="nav-link text-white" href="<?= base_url('/admin/artikel/add'); ?>">Tambah Artikel</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>
    <!-- Main Content -->
    <main class="col-12 col-md-9">
      <section id="main-admin">
        <!-- Konten dinamis kamu akan dimuat di sini -->
