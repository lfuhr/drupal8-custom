<?php

namespace Drupal\fgz_formular_prefill\Plugin\views\sort;

use Drupal\views\Plugin\views\sort\Date;

/**
 * Sorts by the abs of the difference to now. This makes most sense if combined with a past/future filter.
 *
 * @ViewsSort("absToDiffToNow")
 */
class AbsToDiffToNow extends Date {

  /**
   * Called to add the sort to a query.
   */
  public function query() {
    $this->ensureMyTable();

    $date_alias = "UNIX_TIMESTAMP($this->tableAlias.$this->realField)";

    $this->query->addOrderBy(NULL,
      "ABS($date_alias - UNIX_TIMESTAMP())",
      $this->options['order'],
      "distance_from_now"
    );
  }
}