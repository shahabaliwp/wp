(function ($) {
	("use strict");

	var $document = $(document);
	var $window = $(window);

	wooQuantityButtons();
	addToWishlist();
	wooProductImage();
	// wooOffcanvasMenuCart();

	function wooQuantityButtons() {
		var forms = jQuery(".woocommerce-cart-form, form.cart");
		forms.find(".quantity.hidden").prev(".quantity__button").hide();
		forms.find(".quantity.hidden").next(".quantity__button").hide();

		$document.on(
			"click",
			"form.cart .quantity__button, .woocommerce-cart-form .quantity__button",
			function () {
				var $this = $(this);

				// Get current quantity values
				var qty = $this.closest(".quantity").find(".qty");
				var val = qty.val() == "" ? 0 : parseFloat(qty.val());
				var max = parseFloat(qty.attr("max"));
				var min = parseFloat(qty.attr("min"));
				var step = parseFloat(qty.attr("step"));

				// Change the value if plus or minus
				if ($this.is(".quantity__plus")) {
					if (max && max <= val) {
						qty.val(max).change();
					} else {
						qty.val(val + step).change();
					}
				} else {
					if (min && min >= val) {
						qty.val(min).change();
					} else if (val >= 1) {
						qty.val(val - step).change();
					}
				}
			}
		);
	}

	function addToWishlist() {
		$document.on("added_to_wishlist removed_from_wishlist", function () {
			$.get(
				yith_wcwl_l10n.ajax_url,
				{
					action: "yith_wcwl_update_wishlist_count",
				},
				function (data) {
					if (0 === data.count) {
						$(".sedona-shop-menu-wishlist__count").addClass("d-none");
					} else {
						$(".sedona-shop-menu-wishlist__count").removeClass("d-none");
					}
					$(".yith-wcwl-items-count").html(data.count);
				}
			);
		});
	}

	function wooProductImage() {
		const $slider = $(".woocommerce-product-gallery");

		if ($slider.length === 0) return;

		$window.on("resize", function () {
			if ($slider.length > 0) {
				$slider.each(function () {
					const $this = $(this);
					$this.find(".flex-viewport").css("height", "auto");
				});
			}
		});
	}

	function wooOffcanvasMenuCart() {
		let offcanvas = $(".sedona-shop-offcanvas");

		if (!offcanvas) {
			return;
		}

		let trigger = $(".sedona-shop-offcanvas-js-trigger");
		let panel = offcanvas.find(".sedona-shop-offcanvas__panel");
		let overlay = offcanvas.find(".sedona-shop-offcanvas__overlay");
		let close = offcanvas.find(".sedona-shop-offcanvas__close");

		// Open after added to cart
		if (trigger.hasClass("sedona-shop-auto-open")) {
			$document.on("added_to_cart", () => {
				if (
					typeof wc_add_to_cart_params !== "undefined" ||
					wc_add_to_cart_params.cart_redirect_after_add !== "yes"
				) {
					panel.addClass("sedona-shop-offcanvas__panel--is-open");
				}
			});
		}

		trigger.on("click", function (e) {
			e.preventDefault();
			panel.addClass("sedona-shop-offcanvas__panel--is-open");
		});

		function closePanel() {
			panel.removeClass("sedona-shop-offcanvas__panel--is-open");
			document.activeElement.blur();
		}

		// Close on icon click
		close.on("click", function (e) {
			closePanel();
		});

		// Close on overlay click
		overlay.on("click", function (e) {
			closePanel();
		});

		// Close on scroll
		$window.on("scroll", function (e) {
			closePanel();
		});

		// Close on click or on esc
		$document.on("keyup", function (e) {
			if (27 === e.keyCode) {
				closePanel();
			}
		});
	}
})(jQuery);
