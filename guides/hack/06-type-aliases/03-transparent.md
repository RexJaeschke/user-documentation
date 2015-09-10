#Transparent Type Aliases

An alias created using `type` is a transparent type alias. For a given type, that type and all transparent aliases to that type are all the same type, and can be freely interchanged. There are no restrictions on where a transparent type alias can be defined or which source code can access its underlying implementation.

It is important to understand that the compiler *never* distinguishes between a type alias name and the type to which it is aliased. So why go to the trouble of defining an abstract type is the compilation environment doesn't enforce its use? Ordinarily you wouldn't! After all, the whole point of having an abstract type is to allow code to be written that does *not* rely on how that type is actually represented. 


