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

<!-- Required Js -->
<script src="{{ asset('assets/js/plugins/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/bootstrap.min.js') }}"></script>

<script src="{{ asset('assets/js/plugins/i18next.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/i18nextHttpBackend.min.js') }}"></script>

<script src="{{ asset('assets/js/icon/custom-font.js') }}"></script>
<script src="{{ asset('assets/js/script.js') }}"></script>
<script src="{{ asset('assets/js/theme.js') }}"></script>
<script src="{{ asset('assets/js/multi-lang.js') }}"></script>
<script src="{{ asset('assets/js/plugins/feather.min.js') }}"></script>

<div class="floting-button">
  <a
    href="https://1.envato.market/zNkqj6"
    class="btn btn-danger buynowlinks d-inline-flex align-items-center gap-2"
    data-bs-toggle="tooltip"
    title="Buy Now"
  >
    <i class="ph-duotone ph-shopping-cart"></i>
    <span>Buy Now</span>
  </a>
</div>

{{-- Layout Config --}}
<script>
  layout_change('light');
  change_box_container('false');
  layout_caption_change('true');
  layout_rtl_change('false');
  preset_change('preset-1');
  main_layout_change('vertical');
</script>

@stack('scripts')
