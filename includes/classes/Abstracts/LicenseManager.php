<?php
/**
 * License Manager Class
 *
 * @since 2.4
 */

namespace WPTravelEngine\Abstracts;

use WP_Error;

/**
 * Class LicenseManager
 *
 * @since 2.4
 */
abstract class LicenseManager {

	/**
	 * Instance
	 *
	 * @var LicenseManager
	 */
	protected static LicenseManager $instance;

	/**
	 * @var string
	 */
	protected string $license = '';

	/**
	 * @var mixed
	 */
	public $store_url;

	/**
	 * Plugin file path.
	 *
	 * @var mixed
	 */
	protected string $plugin;

	/**
	 * @var string
	 */
	protected string $version;

	/**
	 * @var array
	 */
	protected array $args = array();

	/**
	 * @var int
	 */
	public int $item_id;

	/**
	 * @var string
	 */
	protected string $author = "WP Travel Engine";

	/**
	 * @var bool
	 */
	protected bool $beta = false;

	abstract public function save();

	/**
	 * Get instance
	 *
	 * @param array $args
	 *
	 * @return LicenseManager
	 */
	public static function instance( array $args = array() ): LicenseManager {
		if ( ! isset( static::$instance ) ) {
			static::$instance = new static( $args );
		}

		return static::$instance;
	}

	/**
	 * LicenseManager constructor.
	 */
	public function __construct( $args ) {

		$_args = wp_parse_args(
			$args,
			array(
				'version' => '',
				'license' => '',
				'item_id' => '',
				'author'  => 'WP Travel Engine',
				'beta'    => false,
				'plugin'  => '',
			)
		);

		$this->version   = $_args[ 'version' ];
		$this->license   = $_args[ 'license' ];
		$this->item_id   = $_args[ 'item_id' ];
		$this->author    = $_args[ 'author' ];
		$this->beta      = $_args[ 'beta' ];
		$this->plugin    = $_args[ 'plugin' ];
		$this->store_url = WP_TRAVEL_ENGINE_STORE_URL;

		$this->args = $_args;
	}



	/**
	 * Get license key.
	 *
	 * @return string
	 */
	public function license_key(): string {
		return $this->license;
	}

	/**
	 * Get license status.
	 *
	 * @return string
	 */
	public function status(): string {

		return '';
	}

	/**
	 * Set store url.
	 *
	 * @return $this
	 */
	public function set_store_url( $store_url ): LicenseManager {
		$this->store_url = $store_url;

		return $this;
	}

	/**
	 * Set plugin file.
	 *
	 * @return $this
	 */
	public function set_plugin( $plugin ): LicenseManager {
		$this->plugin = $plugin;

		return $this;
	}

	/**
	 * Initialize Updater.
	 *
	 * @param array $args
	 *
	 * @return \EDD_SL_Plugin_Updater
	 */
	public function initialize_updater( array $args = array() ): \EDD_SL_Plugin_Updater {
		return new \EDD_SL_Plugin_Updater(
			$this->store_url,
			$this->plugin,
			array_merge(
				array(
					'version' => $this->version,
					'license' => $this->license,
					'item_id' => $this->item_id,
					'author'  => $this->author,
					'beta'    => $this->beta,
				),
				$args
			)
		);
	}

	/**
	 * Check license.
	 *
	 * @return WP_Error|License
	 */
	abstract public function license();

	/**
	 * Verify SSL.
	 *
	 * @return bool
	 */
	public function verify_ssl(): bool {
		return (bool) apply_filters( 'edd_sl_api_request_verify_ssl', true );
	}

}
