# Performance Comparison of Array Processing Methods in PHP

This project is a performance benchmark to compare two methods of processing and merging arrays in PHP. It generates test data and measures the execution time of each method to evaluate their efficiency.

## Usage

### Requirements

- PHP 7.4 or later is recommended due to the use of the spread operator (`...`) in `methodTwo`.

### Running the Script

1. Save the script `performance_test.php`.
2. Execute the script using the PHP CLI:

   ```bash
   php performance_test.php

## Our Results

The script was tested on PHP 8.2.25 with the following parameters:

- `$data` contains 10,000 sub-arrays.
- Each sub-array contains 100 values.

### Performance Results

| Method                               | Execution Time (seconds) | Relative Speed |
|--------------------------------------|--------------------------|----------------|
| Using `array_merge` inside the loop  | **60.691**               | 1x (Baseline)  |
| Using `[]` and a single `array_merge` with spread operator | **0.027**                | **2248x faster** |

### Analysis

- **`array_merge` in the loop**:
    - Iteratively merging arrays inside the loop results in significant overhead due to repeated calls to `array_merge`.

- **Spread operator with a single `array_merge`**:
    - Collecting all sub-arrays first and performing a single `array_merge` using the spread operator is vastly more efficient.

These results clearly demonstrate that avoiding repeated calls to `array_merge` inside loops can lead to substantial performance gains, especially when processing large datasets.

### Conclusion

When handling large datasets, leveraging the spread operator and minimizing the number of function calls can dramatically improve performance.
