@extends('layouts.app')
@section('content')
    {{-- Use add and update student just with one form  --}}
    <main>
        <div class="container-fluid">
            <div class="row ">
                <div class="col-md-6 mx-auto">
                    <div class="card m-5">
                        @if (isset($student))
                            {{-- condition if request have data obj --}}
                            <form class="studentForm" method="post" action="{{ route('update', $student->id) }}">
                                @method('PUT')
                                @csrf
                                <div class="card-header text-light" style="background-color:#A39624;">
                                    <h4>生徒更新</h4>
                                </div>
                            @else
                                <form class="studentForm" method="post" action="{{ route('store') }}">
                                    @csrf
                                    <div class="card-header text-light" style="background-color:#A39624;">
                                        <h4>生徒追加</h4>
                                    </div>
                        @endif
                        <div class="card-body bg-light">
                            <div id="message"></div>
                            <div class="form-group mt-3">
                                <label>ロール番号</label>
                                @if (isset($student))
                                    <input type="text" name="roll_no" id="roll_no"
                                        class="form-control  @error('roll_no') is-invalid @enderror"
                                        value="{{ old('roll_no', $student->roll_no ?? '') }}" disabled>
                                    {{-- disable input box if update --}}
                                @else
                                    <input type="text" name="roll_no" id="roll_no"
                                        class="form-control  @error('roll_no') is-invalid @enderror"
                                        value="{{ old('roll_no', $student->roll_no ?? '') }}">
                                @endif
                                @error('roll_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <label>氏名</label>
                                <input type="text" name="student_name" id="student_name"
                                    class="form-control  @error('student_name') is-invalid @enderror"
                                    value="{{ old('student_name', $student->student_name ?? '') }}">
                                @error('student_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group my-3">
                                <label>年齢</label>
                                <input type="text" name="age"
                                    class="form-control  @error('age') is-invalid @enderror" id="age"
                                    value="{{ old('age', $student->age ?? '') }}">
                                @error('age')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer bg-light d-flex justify-content-center">
                            @csrf
                            <input type="submit" class="btn text-light mx-1" id="submitbtn"
                                value=" @if (isset($student)) 更新@else 登録 @endif"
                                style="background-color:#A39624;">
                            @if (isset($student))
                                <a class="btn btn-secondary" href="{{ route('all') }}">キャンセル</a>
                            @else
                                <input type="submit" class="btn btn-secondary mx-1" id="clearbtn" value="キャンセル">
                            @endif
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @push('other-scripts')
        <script type="text/javascript" src="{{ URL::asset('js/student/add.js') }}"></script>
    @endpush
@endsection
