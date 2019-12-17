 <table class="table table-bordered table-striped" style="white-space: nowrap;" id="table_lophoc">
          <thead style="background-color: black; color: white;">
            <tr>
              <th scope="col">STT</th>
              <th scope="col">Mã lớp học</th>
              <th scope="col">Tên lớp học</th>
              <th scope="col">Khối</th>
              <th scope="col">Giáo viên chủ nhiệm</th>
            </tr>
          </thead>
          <tbody style="background-color: white; color: black; overflow: auto;">
            @foreach($data as $LH)
            <tr>
              <th scope="row">{{$loop->iteration}}</th>
              <td>{{$LH -> malophoc}}</td>
              <td>{{$LH -> tenlophoc}}</td>
              <td>{{$LH -> khoi}}</td>
              <td>{{$LH -> tengv}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>