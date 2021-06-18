  {{-- <!-- The Modal -->
  <div class="modal fade" style="display:none;" id="myModal" tabindex="-1" role="dialog"    >
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
      @yield('modal-body')
      <div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				<button type="submit" class="submitFormBtn btn btn-primary">Save</button>
        <span style="display:none" class="dashboard-spinner spinner-xs formSpinner"></span>
      </div>
		</form>
      </div>
    </div>
  </div> --}}

  <div class="modal fade" id="myModal" tabindex="-1" style="display:none;" role="dialog" aria-labelledby="myModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

          @yield('modal-body')
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="submit" class="submitFormBtn btn btn-primary">Save</button>
    <span style="display:none" class="dashboard-spinner spinner-xs formSpinner"></span>
        </div>
    </form>
      </div>
    </div>
  </div>
