
plugin.tx_test_test {
  view {
    # cat=plugin.tx_test_test/file; type=string; label=Path to template root (FE)
    templateRootPath = EXT:test/Resources/Private/Templates/
    # cat=plugin.tx_test_test/file; type=string; label=Path to template partials (FE)
    partialRootPath = EXT:test/Resources/Private/Partials/
    # cat=plugin.tx_test_test/file; type=string; label=Path to template layouts (FE)
    layoutRootPath = EXT:test/Resources/Private/Layouts/
  }
  persistence {
    # cat=plugin.tx_test_test//a; type=string; label=Default storage PID
    storagePid =
  }
}
