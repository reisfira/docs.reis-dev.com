<h5>Summary</h5>
<ul>
    <li class="mb-3">
        <code>parse_numbers($numbers, $is_integer = false)</code>
        <ul>
            <li class="mb-3">Requirements:
                <ul>
                    <li><code>$numbers</code> has to be a string. If its null or empty, directly returns 0</li>
                </ul>
            </li>
            <li class="mb-3">Scenario to use:
                <ul>
                    <li>Normally, when you want to save request to database, and you need to make sure you're passing a number instead of a string</li>
                    <li>This function even accepts when the value contains comma like <code>'1,253.99'</code> and translate it to <code>1253.99</code></li>
                </ul>
            </li>
            <li>Example Usage:
                <pre class="py-0">
                    <code class="language-php py-0">
# when $request['amount'] could actually be a string e.g.: '12.34'
$resource->update([ 'amount' => parse_numbers($request['amount']) ])    // $resource->amount = 12.34

# when $request['quantity'] has a value like: 1.05, but you want it to be 1;
# when the 2nd parameter is set to `true` translates the input using `intval()` instead of `floatval()`
$actual_quantity = parse_numbers($request['quantity'], true)            // $actual_quantity = 1
                    </code>
                </pre>
            </li>
        </ul>
    </li>
    <li class="mb-3">
        <code>display_numbers($numbers, $decimal_count = 0, $is_integer = false, $show_zero_in_numbers = false)</code>
        <ul>
            <li class="mb-3">Scenario to use:
                <ul>
                    <li>This function displays numbers so that it'd not be null or string or any other type</li>
                    <li>This function is useful to display data in report or interface</li>
                </ul>
            </li>
            <li>Example Usage:
                <pre class="py-0">
                    <code class="language-php py-0">
# when used in .blade (usually in reports or some view), input e.g.: 1.56128
&lt;p&gt;&lcub;&lcub; display_numbers($weight, 2) &rcub;&rcub; kg&lt;/p&gt;                 // result: 1.56 kg

# when used in report to display number, input e.g.: 0.00
&lt;td&gt; &lcub;&lcub; display_numbers($weight, 2, false) &rcub;&rcub; &lt;/td&gt;         // result: '-'
&lt;td&gt; &lcub;&lcub; display_numbers($weight, 2, false, true) &rcub;&rcub; &lt;/td&gt;   // result: 0

# ! note: the 2nd parameter $decimal_count, determines the last number after the . using number_format() method, not rounding by floor() or ceil()
                    </code>
                </pre>
            </li>
        </ul>
    </li>
    <li class="mb-3">
        <code>extract_number($string)</code>
        <ul>
            <li>Scenario to use:
                <ul>
                    <li>This function extracts number from string, especially useful to extract "1" from DA001 or C0001</li>
                </ul>
            </li>
            <li>Example Usage:
                <pre class="py-0">
                    <code class="language-php py-0">
# when the string passed has mixed numbering, e.g.: $running_no = DA001
extract_number($running_no)     // result: 1
extract_number('CA012')         // result: 12
                    </code>
                </pre>
            </li>
        </ul>
    </li>
    <li class="mb-3">
        <code>calculate_rounding($numbers)</code>
        <ul>
            <li>Scenario to use: <em>self-explanatory</em></li>
            <li>Example Usage:
                <pre class="py-0">
                    <code class="language-php py-0">
# when the number (float) passed e.g.: $number = 102.34
$rounding = calculate_rounding($number)     // result: 0.01
                    </code>
                </pre>
            </li>
        </ul>
    </li>
</ul>

<h5>Full Implementation</h5>
<pre><code>{{ file_get_contents(base_path('app/Helpers/number.php')) }}</code></pre>
