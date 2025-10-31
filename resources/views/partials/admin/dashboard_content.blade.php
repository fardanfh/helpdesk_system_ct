<!-- Admin dashboard main content (extracted from template) -->
<div class="pc-container">
  <div class="pc-content">
    <!-- [ Main Content ] start -->
    <div class="row">
      <div class="col-12">
        <div class="card welcome-banner bg-blue-800">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-6">
                <div class="p-4">
                  <h2 class="text-white">Explore Redesigned Able Pro</h2>
                  <p class="text-white">The Brand new User Interface with power of Bootstrap Components. Explore the Endless possibilities with Able Pro.</p>
                  <a href="https://1.envato.market/zNkqj6" class="btn btn-outline-light">Exclusive on Themeforest</a>
                </div>
              </div>
              <div class="col-sm-6 text-center">
                <div class="img-welcome-banner">
                  <img src="{{ asset('assets/images/widget/welcome-banner.png') }}" alt="img" class="img-fluid" />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- (Remaining dashboard widgets copied from template) -->
      <!-- For brevity, include the original template's main content here. You can split into smaller partials later. -->

      @includeIf('partials.admin._dashboard_widgets')

    </div>
    <!-- [ Main Content ] end -->
  </div>
</div>

<!-- [Page Specific JS] start -->
<script src="{{ asset('assets/js/plugins/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/js/widgets/all-earnings-graph.js') }}"></script>
<script src="{{ asset('assets/js/widgets/page-views-graph.js') }}"></script>
<script src="{{ asset('assets/js/widgets/total-task-graph.js') }}"></script>
<script src="{{ asset('assets/js/widgets/download-graph.js') }}"></script>
<script src="{{ asset('assets/js/widgets/customer-rate-graph.js') }}"></script>
<script src="{{ asset('assets/js/widgets/tasks-graph.js') }}"></script>
<script src="{{ asset('assets/js/widgets/total-income-graph.js') }}"></script>
<!-- [Page Specific JS] end -->

<script>
  // ensure main layout is applied as original template
  if (typeof main_layout_change === 'function') {
    try { main_layout_change('vertical'); } catch (e) { /* ignore */ }
  }
</script>
