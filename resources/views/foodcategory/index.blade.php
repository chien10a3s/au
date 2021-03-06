@extends('voyager::master')

@section('page_header')
    <h1 class="page-title">
        <i class="voyager-list"></i> Danh mục sản phẩm
    </h1>
    &nbsp;
    <a href="{{ route('foodcategory.create') }}" class="btn btn-success">
        <i class="voyager-plus"></i> Thêm danh mục sản phẩm
    </a>
@stop

@section('css')
<style>
    form.delete-form {
        display: inline-block;
    }
</style>
@stop

@section('content')
    <div class="page-content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">
                        <table id="sample_1" class="table table-hover">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên</th>
                                <th>URL</th>
                                <th>Trạng thái</th>
                                <th>Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($foodcategories) > 0)
                                <?php $i = 0 ?>
                                @foreach($foodcategories as $foodcategory)
                                    <tr>
                                        <td>{{ $i+=1 }}</td>
                                        <td>{{ $foodcategory->name }}</td>
                                        <td>{{ $foodcategory->slug }}</td>
                                        <td>
                                            @if($foodcategory->active == 1)
                                                Hoạt động
                                            @else
                                                Vô hiệu
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('foodcategory.edit',$foodcategory->id) }}" title="Chỉnh sửa"
                                               class="btn-sm btn-primary pull-right edit">
                                                <i class="voyager-edit"></i> Sửa
                                            </a>
                                            
                                            <div class="btn-sm btn-danger pull-right delete" data-id="{{ $foodcategory->id }}" id="delete-{{ $foodcategory->id }}">
                                                <i class="voyager-trash"></i> Xóa
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal modal-danger fade" tabindex="-1" id="delete_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="voyager-trash"></i> Bạn chắc chắn muốn xóa danh mục sản phẩm này?</h4>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('foodcategory.index') }}" id="delete_form" method="POST">
                        {{ method_field("DELETE") }}
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-danger pull-right delete-confirm" value="Đúng, Xóa nó đi">
                    </form>
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Không xóa</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@stop

@section('javascript')
    <script>

        $('td').on('click', '.delete', function (e) {
            var form = $('#delete_form')[0];

            form.action = parseActionUrl(form.action, $(this).data('id'));

            $('#delete_modal').modal('show');
        });

        function parseActionUrl(action, id) {
            return action.match(/\/[0-9]+$/)
                    ? action.replace(/([0-9]+$)/, id)
                    : action + '/' + id;
        }
    </script>
@stop