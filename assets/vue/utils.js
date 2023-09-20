
const validar = (cpf) => checkAll(prepare(cpf));

const notDig = (i) => ![".", "-", " "].includes(i);
const prepare = (cpf) => cpf.trim().split("").filter(notDig).map(Number);
const is11Len = (cpf) => cpf.length === 11;
const notAllEquals = (cpf) => !cpf.every((i) => cpf[0] === i);
const onlyNum = (cpf) => cpf.every((i) => !isNaN(i));

const calcDig = (limit) => (a, i, idx) => a + i * (limit + 1 - idx);
const somaDig = (cpf, limit) => cpf.slice(0, limit).reduce(calcDig(limit), 0);
const resto11 = (somaDig) => 11 - (somaDig % 11);
const zero1011 = (resto11) => ([10, 11].includes(resto11) ? 0 : resto11);

const getDV = (cpf, limit) => zero1011(resto11(somaDig(cpf, limit)));
const verDig = (pos) => (cpf) => getDV(cpf, pos) === cpf[pos];

const checks = [is11Len, notAllEquals, onlyNum, verDig(9), verDig(10)];
const checkAll = (cpf) => checks.map((f) => f(cpf)).every((r) => !!r);







Vue.component('linkcontato', {
	//props: ['theme'],
	template: `
		<a href="javascript:;" v-on:click="openModal"><slot></slot></a>
	`,
	data() {
		return {
			show: false 
		};
	},
	methods: {
		openModal: function () {
			vueContato.openModal();
		},
	}
});







// MASK
var tokens = {
	'#': {pattern: /\d/},
	'S': {pattern: /[a-zA-Z]/},
	'A': {pattern: /[0-9a-zA-Z]/},
	'U': {pattern: /[a-zA-Z]/, transform: v => v.toLocaleUpperCase()},
	'L': {pattern: /[a-zA-Z]/, transform: v => v.toLocaleLowerCase()}
}

function applyMask (value, mask, masked = true) {
  value = value || ""
  var iMask = 0
  var iValue = 0
  var output = ''
  while (iMask < mask.length && iValue < value.length) {
    cMask = mask[iMask]
    masker = tokens[cMask]
    cValue = value[iValue]
    if (masker) {
      if (masker.pattern.test(cValue)) {
      	output += masker.transform ? masker.transform(cValue) : cValue
        iMask++
      }
      iValue++
    } else {
      if (masked) output += cMask
      if (cValue === cMask) iValue++
      iMask++
    }
  }
  return output
}


Vue.directive('mask', {
	bind (el, binding) {
    let value = el.value
    Object.defineProperty(el, 'value', {
        get: function(){
            return value;
        },
        set: function(newValue){
			el.setAttribute('value', newValue)
        },
        configurable: true
    });
  }
});




Vue.component('input-mask', {
	template: `<input v-model="maskedValue" :maxlength="mask.length" :placeholder="mask" :name="maskedName" :id="maskedName" autocomplete="off" value="" />`,
	props: {
		'value': String,
		'mask': String,
		'masked': {
			type: Boolean,
			default: true
		}
	},

	data: () => ({
		currentValue: '',
		currentMask: '',
	}),

  computed: {
	maskedName: {
		get () {}
	},
    maskedValue: {
    	get () {
        // fix removing mask character at the end.
        // Pressing backspace after 1.2.3 result in 1.2. instead of 1.2
		//console.log( 'currentValue'+  this.currentValue );
		//console.log( 'currentMask'+  this.currentMask );
		//return this.value = this.currentMask;
        return this.value === this.currentValue ? this.currentMask : (this.currentMask = applyMask(this.value, this.mask, true))
      },

      set (newValue) {
        var currentPosition = this.$el.selectionEnd
        var lastMask = this.currentMask
        // update the input before restoring the cursor position
        this.$el.value = this.currentMask = applyMask(newValue, this.mask)

        if (this.currentMask.length <= lastMask.length) { // BACKSPACE
          // when chars are removed, the cursor position is already right
          this.$el.setSelectionRange(currentPosition, currentPosition)
        } else { // inserting characters
          // if the substring till the cursor position is the same, don't change position
          if (newValue.substring(0, currentPosition) == this.currentMask.substring(0, currentPosition)) {
            this.$el.setSelectionRange(currentPosition, currentPosition)
          } else { // increment 1 fixed position, but will not work if the mask has 2+ placeholders, like: ##//##
            this.$el.setSelectionRange(currentPosition+1, currentPosition+1)
          }
        }
        this.currentValue = applyMask(newValue, this.mask, this.masked)
        this.$emit('input', this.currentValue)
      }
    }
  }
});

