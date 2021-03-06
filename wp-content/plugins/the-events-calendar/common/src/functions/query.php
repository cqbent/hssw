<?php
/**
 * A set of functions to manipulate queries or query properties.
 *
 * @since 4.9.5
 */

if ( ! function_exists( 'tribe_filter_meta_query' ) ) {
	/**
	 * Removes meta query entries based on key and value.
	 *
	 * Example usage to remove all date-related meta queries, using a regular expression:
	 *
	 * $query->meta_query = tribe_filter_meta_query(
	 *      $args['meta_query'],
	 *      array( 'key' => '/_Event(Start|End)Date(UTC)/' )
	 * );
	 *
	 * @since 4.9.5
	 *
	 * @param array $meta_query The meta query array to filter, usually the content of the `$query->meta_query`
	 *                          property.
	 * @param array $where      A map of criteria for the filtering that will be applied with OR logic: if an
	 *                          entry matches even one then it will be removed. If the value of the comparison is a
	 *                          regular expression, with fences, then it will be used for a `preg_match` check against
	 *                          the key, not a simple comparison.
	 *
	 * @return array The filtered meta query array.
	 */
	function tribe_filter_meta_query( array $meta_query, array $where ) {
		$filtered = [];

		foreach ( $meta_query as $key => $entry ) {
			if ( ! is_array( $entry ) ) {
				$filtered[ $key ] = $entry;
				continue;
			}

			foreach ( $where as $where_key => $where_value ) {
				if ( isset( $entry[ $where_key ] ) ) {
					if ( tribe_is_regex( $where_value ) ) {
						$var = $entry[ $where_key ];
						if ( preg_match( $where_value, $var ) ) {
							continue 2;
						}
					} elseif ( $entry[ $where_key ] == $where_value ) {
						continue 2;
					}
				}
			}
			$filtered[ $key ] = $entry;
		}

		return $filtered;
	}
}

if ( ! function_exists( 'tribe_normalize_orderby' ) ) {

	/**
	 * Normalizes an `orderby` string or array to an map of keys and orders.
	 *
	 * Note the function and the variables use the "orderby" (no spaces) name to stick
	 * with the WordPress query standard.
	 *
	 * @since 4.12.6
	 *
	 * @param string|array<string,string> $orderby Either an `orderby` key, a list of `orderby`
	 *                                             keys or a map of `orderby` clauses.
	 * @param string                      $order   The default order that should be applied to `orderby` entries that
	 *                                             lack one.
	 *
	 * @return array The normalized `orderby` array, in the format supported by WordPress queries:
	 *               `[ <key_1> => <order>, <key_2> => <order>, ... ]`.
	 */
	function tribe_normalize_orderby( $orderby, $order = 'ASC' ) {
		// Make the `orderby` part an array.
		$orderby_arr = (array) $orderby;
		$normalized  = [];

		foreach ( $orderby_arr as $by_key => $direction ) {
			if ( empty( $direction ) ) {
				continue;
			}

			if ( is_numeric( $by_key ) ) {
				// It's an entry where the key is just listed, relying on the default order.
				$by_key    = $direction;
				$direction = $order;
			}

			$normalized[ $by_key ] = $direction;
		}

		return $normalized;
	}
}
