# Type Parameter Variance

Each generic parameter can optionally be marked separately with a variance indicator:
 * `+` for covariance
 * `-` for contravariance

If no variance is indicated, the parameter is invariant.

Here is an example of covariance:

@@ variance-examples/covariance.php @@

A covariant type parameter cannot be used as the type of a parameter on any method, or as the type of any mutable property, in that class.

Here is an example of contravariance:

@@ variance-examples/contravariance.php @@

A contravariant type parameter cannot be used as the return type of any method in that class.
