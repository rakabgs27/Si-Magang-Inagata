@extends('layouts.appError')
<section class="section">
    <div class="container mt-5">
        <div class="page-error">
            <div class="page-inner">
                <h1>403</h1>
                <div class="page-description">
                    You do not have access to this page.
                </div>
                <div class="page-search">
                    <form>
                        <div class="form-group floating-addon floating-addon-not-append">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-search"></i>
                                    </div>
                                </div>
                                <input type="text" class="form-control" placeholder="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-primary btn-lg">
                                        Search
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="mt-3">
                        @role('manager')
                            <a href="/dashboard">Back to Home</a>
                        @endrole
                        @role('user')
                            <a href="/soal-management/test-soal">Back to Home</a>
                        @endrole
                        @role('mentor')
                            <a href="/sistem-pakar/penyakit">Back to Home</a>
                        @endrole
                    </div>
                </div>
            </div>
        </div>
        <div class="simple-footer mt-5">
            2023
        </div>
    </div>
</section>
