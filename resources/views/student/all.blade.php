@extends('layouts.app')
@section('content')
    <div class="container">
        <main>
            <div class="container mt-5">
                <h2 style="margin-bottom: 30px; text-align: center;">学生一覧</h2>
                @if (session('info'))
                    <div class="alert alert-info">
                        {{ session('info') }}
                    </div>@php
                        session()->forget('info');
                    @endphp
                @endif
                <div class="input-group mb-3 dflex justify-content-end">
                    <input type='text' id="searchInput" class="dateFilter" name="searchInput">
                    <i class="icon fa fa-calendar input-group-text text-white" aria-hidden="true"
                        style="background-color:#575013"></i>
                </div>
                <table id="stuTable" class="table table-bordered table-striped dt-responsive" style="width:100%;">
                    <thead style="background-color: #575013;" class=" text-white">
                        <tr>
                            <th>番号</th>
                            <th>ロール番号</th>
                            <th>氏名</th>
                            <th>年齢</th>
                            <th>登録日</th>
                            <th>更新</th>
                            <th>削除</th>
                        </tr>
                    </thead>

                </table>

            </div>
        </main>
    </div>
    <!--delete student confirmation modal-->
    <div class="modal fade" id="deletemodal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">学生を削除する</h5>
                </div>
                <form action="{{ route('deleteById') }}" method="post">
                    @csrf
                    @method('delete')
                    <div class="modal-body">
                        <input type="text" name="stu_id" id="stu_id" value="" hidden>
                        <h4>削除してもよろしいですか?</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">キャンセル</button>
                        <button type="submit" id="deletebtn" name="delete_student" class="btn btn-danger">削除</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @push('other-scripts')
        <script type="text/javascript" src="{{ URL::asset('js/student/list.js') }}"></script>
    @endpush
@endsection
