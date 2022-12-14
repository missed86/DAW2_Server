def suma(a,b):
    """
    >>> suma(10,5)
    15
    >>> suma(-2,-3)
    -5
    """
    return a+b

if __name__ == "__main__":
    import doctest
    doctest.testmod()