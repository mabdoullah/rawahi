<!-- start delete modal -->
<div id="DeleteModal" class="modal fade " role="dialog" >
        <div class="modal-dialog ">
          <!-- Modal content-->
          <form action="{{route('partners.destroy','default')}}" id="deleteForm" method="post">
              <div class="modal-content ">
                  <div class="modal-header">
     
                      <h5 class="modal-title "> تاكيد الحذف</h5>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
                      <p class="text-center">هل انت متاكد ؟</p>
                      <input type="hidden" id='delete_id' name='delete_id' value="">
     
                  </div>
                  <div class="modal-footer">
                      <div>
                          <button type="submit" name="" class="btn btn-secondary" data-dismiss="modal" onclick="formSubmit()">نعم</button>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
                      </div>
                  </div>
              </div>
          </form>
        </div>
       </div>
       <!-- end delete modal -->
     