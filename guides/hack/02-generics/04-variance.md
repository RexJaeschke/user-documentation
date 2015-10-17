# Type Parameter Variance

Each generic parameter can optionally be marked separately with a variance indicator:
 * `+` for covariance
 * `-` for contravariance

If no variance is indicated, the parameter is invariant.

Here is an example of covariance:

@@ variance-examples/covariance.php @@

Here is an example of contravariance:

@@ variance-examples/contravariance.php @@
