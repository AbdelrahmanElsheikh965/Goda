@extends('Admin.master')

@section('title', 'Paragraphs Page')
@section('current-page', 'Paragraphs')
@section('small-title', 'Adjust your phrases')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <i class="fa fa-file-text-o"></i>
                        <h3 class="box-title">Paragraphs</h3>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <form role="form" id="para-form" action="{{route('paragraphs.update')}}" method="post">
                            @csrf
                            {{method_field('PATCH')}}
                            <div class="box-body">
                                <div class="form-group">
                                    <label> Header </label> <br>

                                    <label> Header Paragraph #1 (title) </label>
                                    <input type="text" name="{{@$paragraphs[0]->id . '.title'}}" class="form-control" value="{{@$paragraphs[0]->title}}">
                                    <label> Header Paragraph #1 (body) </label>
                                    <textarea class="form-control" name="{{@$paragraphs[0]->id . '.body'}}" rows="2"> {{@$paragraphs[0]->body}} </textarea>
                                </div>

                                <div class="form-group">
                                    <label> Header </label> <br>

                                    <label> Header Paragraph #2 (title) </label>
                                    <input type="text" name="{{@$paragraphs[1]->id . '.title'}}" class="form-control" value="{{@$paragraphs[1]->title}}">
                                    <label> Header Paragraph #2 (body) </label>
                                    <textarea class="form-control" name="{{@$paragraphs[1]->id . '.body'}}" rows="2"> {{@$paragraphs[1]->body}} </textarea>
                                </div>

                                <div class="form-group">
                                    <label> Header </label> <br>

                                    <label> Header Paragraph #3 (title) </label>
                                    <input type="text" name="{{@$paragraphs[2]->id . '.title'}}" class="form-control" value="{{@$paragraphs[2]->title}}">
                                    <label> Header Paragraph #3 (body) </label>
                                    <textarea class="form-control" name="{{@$paragraphs[2]->id . '.body'}}" rows="2"> {{@$paragraphs[2]->body}} </textarea>
                                </div>



                            </div>
                            <button type="submit" form="para-form" formtarget="para-form" class="btn btn-warning"> Update </button>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->

            <div class="col-md-6">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <i class="fa fa-file-text-o"></i>
                        <h3 class="box-title">Paragraphs 2nd section </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="form-group">
                            <label> Footer </label> <br>

                            <label> Footer Paragraph #1 (title) </label>
                            <input type="text" name="{{@$paragraphs[3]->id . '.title'}}" class="form-control" value="{{@$paragraphs[3]->title}}">
                            <label> Footer Paragraph #1 (body) </label>
                            <textarea class="form-control" name="{{@$paragraphs[3]->id . '.body'}}" rows="2"> {{@$paragraphs[3]->body}} </textarea>
                        </div>

                        <div class="form-group">
                            <label> About Us </label> <br>

                            <label> About Us Paragraph #1 (title) </label>
                            <input type="text" name="{{@$paragraphs[4]->id . '.title'}}" class="form-control" value="{{@$paragraphs[4]->title}}">
                            <label> About Us Paragraph #1 (body) </label>
                            <textarea class="form-control" name="{{@$paragraphs[4]->id . '.body'}}" rows="2"> {{@$paragraphs[4]->body}} </textarea>
                        </div>
                        @include('Helpers_Views.errors')
                    </div>

                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>

            </form>
            <!-- /.col -->
            </div>

    </section>
    <!-- /.content -->
@endsection
