<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Tugas PHP</title>
  <link rel="stylesheet" href="./public/src/bootstrap.min.css">
  <link rel="stylesheet" href="./public/src/custom.css">
</head>
<body>

<div class="container">

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">SIAK STIMIK </a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <!-- <ul class="nav navbar-nav">
        <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form> -->
      <ul class="nav navbar-nav navbar-right">
        <li><a href="/">Depan</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Master <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="?hal=master_semester">Semester</a></li>
            <li><a href="?hal=master_dosen">Dosen</a></li>
            <li><a href="?hal=master_mahasiswa">Mahasiswa</a></li>
            <li><a href="?hal=master_jurusan">Jurusan</a></li>
            <li><a href="?hal=master_matkul">Mata Kuliah</a></li>
          </ul>
        </li>

        <li class="dropdown">
          <a href="#" data-toggle="dropdown" aria-expanded="false" class="dropdown-toggle">KHS <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="?hal=khs_input">Input</a></li>
            <li><a href="?hal=khs_data">Data</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>