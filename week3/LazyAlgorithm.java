// Implement Lazy Evaluation with Cache
import java.util.HashMap;
import java.util.Map;

// The LazyAlgorithm class implements the Algorithm interface and adds lazy evaluation with caching.
class LazyAlgorithm implements Algorithm {
    // The underlying algorithm to be lazily evaluated and cached.
    private Algorithm algorithm;

    // Cache to store already computed results for quick retrieval.
    private Map<Integer, Double> cache = new HashMap<>();

    // Constructor to initialize the LazyAlgorithm with the underlying algorithm.
    public LazyAlgorithm(Algorithm algorithm) {
        this.algorithm = algorithm;
    }

    // Method to get the name of the lazy algorithm, enhancing it with the mention of caching.
    public String getName() {
        return algorithm.getName() + " with Cache";
    }

    // Method to get the value for a given input 'n'. If the result is already in the cache, retrieve it.
    // Otherwise, compute the result using the underlying algorithm, store it in the cache, and return it.
    public double getVal(int n) {
        if (cache.containsKey(n)) {
            // Return the cached result if available.
            return cache.get(n);
        } else {
            // Compute the result using the underlying algorithm.
            double result = algorithm.getVal(n);

            // Cache the result for future use.
            cache.put(n, result);

            // Return the computed result.
            return result;
        }
    }
}
